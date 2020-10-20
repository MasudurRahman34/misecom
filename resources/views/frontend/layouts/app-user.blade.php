<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <title>@yield('title', 'Admin')</title>

    <link rel="icon" href="{{ asset('backend/files/assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/files/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/files/assets/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/files/assets/icon/feather/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/files/assets/icon/font-awesome/css/font-awesome.min.css') }}">
    
    
    <link rel="stylesheet" type="text/css" href="{{ mix('css/all.css') }}">

</head>

<body>

    @include('backend.partials.them-loader')
   
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

           @include('backend.partials.navbar')

            
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('frontend.partials.user-sidebar')
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                @include('backend.partials.massage')


                                @yield('user-content')

                                <div class="md-overlay"></div>
                                <div id="styleSelector">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
    <script src="{{ mix('js/all.js') }}"></script>

   
@yield('script')
</body>

</html>
