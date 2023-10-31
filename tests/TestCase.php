<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public User $user;
    public User $admin;
    public User $superAdmin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();

        $this->user = User::where('email', 'user@dashcode.com')->firstOrFail();

        $this->admin = User::where('email', 'admin@dashcode.com')->firstOrFail();

        $this->superAdmin = User::where('email', 'superadmin@dashcode.com')->firstOrFail();
    }


}
