<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\UpdateProfileRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use ProtoneMedia\LaravelVerifyNewEmail\Http\InvalidVerificationLinkException;
use ProtoneMedia\LaravelVerifyNewEmail\PendingUserEmail;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProfileRequest  $request
     * @return JsonResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update($request->safe(['name', 'phone', 'post_code', 'city', 'country']));

        // sends verification email if email has changed
        if ($user->email !== $request->validated('email')) {
            // set the route to redirect to after verification
            config(['verify-new-email.route' => 'profile.verify-new-email']);
            // send email verification
            $user->newEmail($request->validated('email'));
            // put it back to default
            config(['verify-new-email.route' => null]);
        }

        if ($request->hasFile('photo')) {
            $user->clearMediaCollection('profile-image');
            $user->addMediaFromRequest('photo')->toMediaCollection('profile-image');
        }

        if (auth()->user()->getPendingEmail()) {
            return $this->responseWithSuccess(
                'A verification email has been sent to your '.auth()->user()->getPendingEmail().'. Please verify your new email address before logging in again.',
                UserResource::make($user)
            );
        }

        return $this->responseWithSuccess(
            'Profile updated successfully',
            UserResource::make($user)
        );
    }

    /**
     * @throws InvalidVerificationLinkException
     */
    public function verifyNewEmail(string $token)
    {
        try {
            $pendingUserEmail = new PendingUserEmail();
            $pendingUserEmail->whereToken($token)
                ->firstOrFail()
                ->tap(
                    function ($pendingUserEmail) {
                        $pendingUserEmail->activate();
                    });

            return view('api.verify-new-email', [
                'message' => __('Your email has been verified successfully. Close this window and continue.'),
                'frontend_url' => config('app.frontend_url'),
            ]);
        } catch (Exception $e) {
            return view('api.verify-new-email', [
                'message' => __('The verification link is not valid anymore.'),
            ]);
        }
    }
}
