<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * @return UserFactory.\Database\Factories\UserFactory.afterCreating
     */
    public function configure(): UserFactory
    {
        if(config('app.is_api_project')){
            return $this->afterCreating(function ($user) {
                $user->assignRole(Role::where(['name' => 'user', 'guard_name' => 'sanctum'])->firstOrFail());
            });
        }

        return $this->afterCreating(function ($user) {
            $user->assignRole(Role::where(['name' => 'user', 'guard_name' => 'web'])->firstOrFail());
        });
    }
}
