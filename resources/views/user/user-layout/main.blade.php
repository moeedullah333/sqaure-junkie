<!DOCTYPE html>
<html lang="en">
<head>
    <title>Square Junkie</title>
    <meta charset="utf-8">
    @include('user.user-layout.css')
    @include('user.user-layout.extrajs')
</head>
<body>
<div class="d-flex" id="wrapper">
    @include('user.user-layout.sidebar')
    @include('user.user-layout.topbar')
@yield('content')
@include('user.user-layout.footer')
</body>
</html>
