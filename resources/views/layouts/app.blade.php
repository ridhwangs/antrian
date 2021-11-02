<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - PT. Suryaputra Sarana</title>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    @yield('custom_style')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('custom_script')
</body>
</html>