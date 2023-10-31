<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\OAuthRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\AuthUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create(
                $request->safe(['name', 'email']) + [
                    'password' => bcrypt($request->validated('password')),
                ]
            );

            $userRole = Role::where(['name' => 'user', 'guard_name' => 'sanctum'])->firstOrFail();
            $user->assignRole($userRole);

            $this->sendVerificationEmail($user);

            $user['token'] = $user->createToken('main')->plainTextToken;

            return $this->responseWithSuccess(
                'User register successfully',
                AuthUserResource::make($user)
                , Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->responseWithError($e->getMessage().' Contact with admin.');
        }
    }

    /**
     * @param  User  $user
     * @param  string  $email
     * @return void
     */
    public function sendVerificationEmail(User $user)
    {
        // set the route to redirect to after verification
        config(['verify-new-email.route' => 'profile.verify-new-email']);
        // send email verification
        $user->newEmail($user->email);
        // put it back to default
        config(['verify-new-email.route' => null]);
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $user = Auth::user();

        $user['token'] = $user->createToken('main')->plainTextToken;

        return $this->responseWithSuccess(
            'User login successfully',
            AuthUserResource::make($user)
        );
    }

    /**
     * Get the authenticated User.
     * @return JsonResponse
     */
    public function user()
    {
        return $this->responseWithSuccess(
            'User returned successfully',
            UserResource::make(Auth::user())
        );
    }

    public function logout()
    {
        $user = Auth::user();
        // Revoke the token that was used to authenticate the current request...
        $user->currentAccessToken()->delete();

        return $this->responseWithSuccess('User logout successfully');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages([
                'email' => [__($status)],
            ]);
        }

        return $this->responseWithSuccess(__($status));
    }

    public function social(OAuthRequest $request)
    {
        try {
            $socialUser = Socialite::driver($request->provider)->stateless()->userFromToken($request->access_token);

            $user = $this->oauthLogin($socialUser);

            $user['token'] = $user->createToken('main')->plainTextToken;

            return $this->responseWithSuccess(
                'User social login successful',
                AuthUserResource::make($user)
            );
        } catch (Exception $exception) {
            return $this->responseWithError(
                $exception->getMessage(),
                code: $exception->getCode()
            );
        }
    }

    public function oauthLogin($user)
    {
        $user = User::firstOrCreate(
            [
                'name' => $user->name ?: $user->nickname,
                'email' => $user->email,
            ],
            [
                'name' => $user->name ?: $user->nickname,
                'email' => $user->email,
                'password' => Hash::make(md5(uniqid().now())),
                'email_verified_at' => now()
            ]
        );

        try {
            $user->assignRole(Role::where(['name' => 'user', 'guard_name' => 'sanctum'])->firstOrFail());
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return $user;
    }

    /**
     * Send a new email verification notification.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function resendVerification(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->responseWithSuccess('Already verified');
        }

        $this->sendVerificationEmail(auth()->user());

        return $this->responseWithSuccess('Verification link sent');
    }
}
