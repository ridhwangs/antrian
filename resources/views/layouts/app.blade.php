<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - PT. Suryaputra Sarana</title>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    @yield('custom_style')
    <style>
        * {
            touch-action: manipulation;
        }
    </style>
</head>
<body>
    
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('custom_script')
</body>
</html>