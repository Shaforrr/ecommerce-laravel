<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/templates/admin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/components.css') }}">

</head>

<body>

<div id="app">

    <div class="main-wrapper">

        @include('layouts.admin.navbar')

        @include('layouts.admin.sidebar')

        @yield('content')

        @include('layouts.admin.footer')

    </div>

</div>

@include('layouts.admin.script')

</body>

</html>