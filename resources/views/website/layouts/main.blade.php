<!Doctype html>
<html>
<head>
	<title>Square Junkie</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="{{asset('assets/website/images/favicon.png')}}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    @include('website.layouts.style')
</head>
<body>
    @php
        $request_url = Request::segment(1);
    @endphp
    
    @if($request_url != 'register' && $request_url != 'user-login' && $request_url !="")
        @include('website.layouts.header')
    @endif
    
    
    @yield('content')
    
    @if($request_url != 'register' && $request_url != 'user-login' && $request_url !="")
        @include('website.layouts.footer')
    @endif
    
    @include('website.layouts.scripts')
</body>
</html>