<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.lionode.com/focus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Sep 2020 07:05:37 GMT -->
<head>
    @yield('title','eshop')
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="e-commerce site well design with responsive view." />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

@include('frontend.partials.style')

</head>
<body>
<div class="preloader loader" style="display: block;"> <img src="{{ asset('frontend/image/loader.gif') }}"  alt="#"/></div>
<header>
    @include('frontend.partials.header')
    {{-- @include('frontend.partials.cart')      --}}
</header>
@include('frontend.partials.navbar')     

<div class="container">

    @yield('breadcrumb')
    {{-- main --}}
    <div class="row">
        {{-- siad-bar --}}
      
        {{-- end siad-bar --}}
        @yield('shop-content')

    </div>
    {{-- end-main --}}
    
</div>
@include('frontend.partials.footer')
@include('frontend.partials.script')
</body>

<!-- Mirrored from html.lionode.com/focus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Sep 2020 07:07:57 GMT -->
</html>
