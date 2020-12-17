<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Code_css/style_Accueil.css">
    <title>
        @if(isset($title))
            {{ $title }}
        @elseif(isset($title2))
            JC - {{ $title2 }}
        @else
            JC
        @endif
    </title>
    @yield('extras_style')
</head>
<body>
    @include('app.nav3')
    @yield('content')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>