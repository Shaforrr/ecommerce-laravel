<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Merch Store')</title>

    @include('layouts.user.style')

</head>

<body>

@include('layouts.user.navbar')

@yield('content')

@include('layouts.user.footer')

@include('layouts.user.script')

</body>

</html>