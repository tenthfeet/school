
<!-- BEGIN: Social Log in Area -->
<ul class="flex">
    {{-- Facebook --}}
    <li class="flex-1">
        <a href="{{route('social.login', 'facebook')}}"
            class="inline-flex h-10 w-10 bg-[#395599] text-white text-2xl flex-col items-center justify-center rounded-full">
            <img src="images/icon/fb.svg" alt="Facebook">
        </a>
    </li>
    {{-- Linkedin --}}
    <li class="flex-1">
        <a href="{{route('social.login', 'linkedin')}}"
            class="inline-flex h-10 w-10 bg-[#0A63BC] text-white text-2xl flex-col items-center justify-center rounded-full">
            <img src="images/icon/in.svg" alt="Linkedin">
        </a>
    </li>
    {{-- Google --}}
    <li class="flex-1">
        <a href="{{route('social.login', 'google')}}"
            class="inline-flex h-10 w-10 bg-[#EA4335] text-white text-2xl flex-col items-center justify-center rounded-full">
            <img src="images/icon/gp.svg" alt="Google">
        </a>
    </li>
    {{-- Github --}}
    <li class="flex-1">
        <a href="{{route('social.login', 'github')}}"
            class="inline-flex h-10 w-10 bg-gray-500 text-white text-2xl flex-col items-center justify-center rounded-full">
            <img src="images/icon/github.svg" alt="github">
        </a>
    </li>
</ul>
<!-- END: Social Log In Area -->

{{-- @if(Route::is('login'))
    <p class="text-center font-light text-base text-textColor mt-8">
        {{ __('Don\'t have an account?') }}
        <a href="{{ route('register') }}" class="text-black font-bold">
            {{ __('Sign Up') }}
        </a>
    </p>
@elseif(Route::is('register'))
    <p class="text-center font-light text-base text-textColor mt-8">
        {{ __('Already registered?') }}
        <a href="{{ route('login') }}" class="text-black font-bold">
            {{ __('Sign in') }}
        </a>
    </p>
@endif --}}
