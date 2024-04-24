<!DOCTYPE html>
<html lang="en">

<head>
    <title>Square Jungle</title>
    <meta charset="utf-8">
    @include('layouts.css')
    @include('layouts.extrajs')

</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="data-loader">
            <div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>


        {{-- <div id="cover">
            <div class="loadingio-spinner-rolling-avt82ldo9vj">
                <div class="ldio-gnrzupa2le8">
                    <div></div>
                </div>
            </div>
        </div> --}}

        @include('layouts.sidebar')
        @include('layouts.topbar')
        @yield('content')
        @include('layouts.footer')
</body>

</html>
