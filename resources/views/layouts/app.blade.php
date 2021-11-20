<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" contnt="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - PT. Suryaputra Sarana</title>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/simple-keyboard@latest/build/css/index.css">
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
    <script src="//cdn.jsdelivr.net/npm/simple-keyboard@latest/build/index.js"></script>
    @yield('custom_script')
</body>
</html>