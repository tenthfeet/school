<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/scss/app.scss', 'resources/css/style.css'])
    @isset($css)
        {{ $css }}
    @endisset
</head>

<body>
    <x-layout.sidebar />
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-3">
            <x-layout.topbar />
            <div class="header-divider"></div>
            @isset($breadcrumb)
                <x-layout.breadcrumb :title="$breadcrumb" :links="$breadcrumb->links ?? ['Dashboard' => route('dashboard')]" />
            @endisset
        </header>
        <div class="body flex-grow-1">
            <div class="container-lg">
                {{ $slot }}
            </div>
        </div>

        <x-layout.footer />
    </div>

    @vite(['resources/js/app.js'])
    @isset($script)
        {{ $script }}
    @endisset
</body>

</html>
