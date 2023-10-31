<x-guest-layout>
    <div class="card mb-0 p-4">
        <div class="card-body">
            <h1>Login</h1>
            <p class="text-medium-emphasis">Sign In to your account</p>
            <form id="login-form" class="mt-4" action="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="employee_no" class="form-control py-2" placeholder="Employee No"
                    autofocus>

                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control py-2" placeholder="Password">
                </div>
                <div class="flex justify-between">
                    <button class="btn-primary btn px-4" type="submit">Login</button>
                    <a class="btn btn-link px-0">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
    <x-slot:script>
        @vite('resources/js/pages/auth/login.js')
    </x-slot:script>
</x-guest-layout>
