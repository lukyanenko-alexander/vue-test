<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div id="app">
    <header>
        <nav class="navbar navbar-dark">
            <div class="navbar-brand">
                <a href="/">Главная</a>
            </div>
            <div>
                <cart></cart>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <cart-content></cart-content>
        </div>
    </div>
</div>

<script src="/js/app.js">

</script>

</body>
</html>
