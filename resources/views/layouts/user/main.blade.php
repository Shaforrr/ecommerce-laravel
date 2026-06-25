<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @include('layouts.user.style')

</head>

<body>

@include('layouts.user.navbar')

<div class="container mt-3">

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

</div>

@yield('content')

@include('layouts.user.footer')

@include('layouts.user.script')

</body>

</html>