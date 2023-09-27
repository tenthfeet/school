<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School</title>
    @vite(['resources/scss/app.scss', 'resources/css/style.css'])
</head>

<body>
    <div class="bg-light min-vh-100 d-flex align-items-center flex-row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-6 col-md-6 col-lg-4">
                    <div class="card-group d-block d-md-flex row">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    @vite('resources/js/app.js')
    @isset($script)
        {{ $script }}
    @endisset
</body>

</html>
