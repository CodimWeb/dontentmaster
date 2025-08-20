<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" href="{{ Vite::asset('resources/img/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ Vite::asset('resources/img/favicon.png') }}" type="image/x-icon">
    @vite('resources/admin/scss/style.scss')
</head>
<body>
<div id="root"></div>

@vite('resources/admin/js/main.js')
</body>
</html>
