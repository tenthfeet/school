<x-guest-layout>
    <div class="card mb-0 p-4">
        <div class="card-body">
            <h1>Login</h1>
            <p class="text-medium-emphasis">Sign In to your account</p>
            <form id="login-form" action="POST">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-user icon"></i>
                        </span>
                        <input class="form-control rounded-end" name="employee_no" type="text" placeholder="Employee No">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock icon"></i>
                        </span>
                        <input class="form-control rounded-end" name="password" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <div class="col text-end">
                        <a class="btn btn-link px-0">Forgot password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-slot:script>
        @vite('resources/js/pages/auth/login.js')
    </x-slot:script>
</x-guest-layout>
