@extends('frontend.layouts.master')
<!--start section -->
@section('title')
<title>App</title>    
@endsection
@section('content')

<div class="container col-2">

    @include('frontend.partials.banner')
    {{-- main --}}

    <div class="row">
        {{-- siad-bar --}}
        @include('frontend.partials.sidebar')
        {{-- end siad-bar --}}

        {{-- main-section --}}

        @include('frontend.pages.product.allproduct')

    </div>
    {{-- end-main --}}
</div>    

@endsection   
<!--end section--> 

@section('script')
   
@endsection