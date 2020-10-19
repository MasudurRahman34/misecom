@extends('frontend.layouts.shop')
<!--start section -->
@section('title')
<title>E-Shop Cart</title>    
@endsection

@section('breadcrumb')
  <ul class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li><a href="cart.html">Shopping Cart</a></li>
    <li><a href="checkout.html">cart</a></li>
    {{-- <li> | My cart Items:  @if  (App\Models\Frontend\Cart::totalItems() > 0)  {{ App\Models\Frontend\Cart::totalItems() }} @endif </li> --}}
  </ul>
@endsection

@section('shop-content')

@include('frontend.partials.sidebar')

    <div class="row justify-content-center">
      <div class="col-xl-9 col-lg-9 col-md-9 col-sm  col-sm-auto" id="content">
        <div id="accordion" class="panel-group">
          <div id="ajax_cart_table">

          </div>
          
        </div>
      </div>
    </div>
  
    

@endsection   
<!--end section--> 

@section('script')

<script type="text/javascript">

</script>
@endsection