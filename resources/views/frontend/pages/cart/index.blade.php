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
</ul>
@endsection
@section('shop-content')

@include('frontend.partials.sidebar')
    <div class="row">
      <div class="col-md-8" id="content">
        <h1>Shopping Cart  | My cart Items:  @if  (App\Models\Frontend\Cart::totalItems() > 0)  {{ App\Models\Frontend\Cart::totalItems() }}</h1>
       
          <div class="table-responsive" id="cart_tale_id">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td>#</td>
                  <td class="text-center">Image</td>
                  <td class="text-left">Product Name</td>
                 
                  <td class="text-left">Quantity</td>
                  <td class="text-right">Unit Price</td>
                  <td class="text-right">Unit Total</td>
                </tr>
              </thead>
              <tbody>
                @php
                $total_price = 0;
                @endphp
                  @foreach (App\Models\Frontend\Cart::totalCarts() as $cart)
                <tr>
                  <td>
                    {{ $loop->index + 1 }}
                  </td>
                  {{-- @if ($cart->product->images->count() > 0)
                  <img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" width="60px">
                  @else
                  <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="iPhone" alt="iPhone" src="{{ asset('frontend/image/product/2product50x59.jpg') }}"></a></td>
                  @endif --}}
                  <td class="text-center" style="max-width: 130px;"><a href="product.html"><img style="max-width: 75%; class="img-thumbnail" title="iPhone" alt="iPhone" src="{{ asset('frontend/image/product/product.jpg') }}"></a></td>
                  {{-- {{ route('products.show', $cart->product->slug) }} --}}

                  <td class="text-left"><a href="" >{{ $cart->product->product_title }}</a></td>
                  <td class="text-left">
                    <div style="max-width: 200px;" class="input-group btn-block">
                      {{-- <input type="hidden" id="cart_id" value="{{ $cart->id }} "> --}}
                      <input style="max-width: 9em;" type="number" name="product_quantity" id="product_quantity_{{ $cart->id }}" class="form-control" value="{{ $cart->product_quantity }}"  min="1">
                      <span class="input-group-btn">
                      <button class="btn btn-primary btn-cart-submit" name="btm-submit" id="{{ $cart->id }}" title="update you cart {{ $cart->id }}" data-toggle="tooltip" type="submit" data-original-title="Update" ><i class="fa fa-refresh"></i></button>
                      <button  class="btn btn-danger btn-cart-delete" title="" data-toggle="tooltip"  id="{{ $cart->id }}" type="button" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                      </span></div></td>
                  <td class="text-right">{{ $cart->product->Price }} Taka</td>
                  <td class="text-right">
                    @php
                    $total_price += $cart->product->Price * $cart->product_quantity;
                    @endphp
    
                    {{ $cart->product->Price * $cart->product_quantity }} Taka
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        
        {{-- <h2>What would you like to do next?</h2>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        <div id="accordion" class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="accordion-toggle" href="#collapse-coupon">Use Coupon Code <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div class="panel-collapse collapse" id="collapse-coupon">
              <div class="panel-body">
                <label for="input-coupon" class="col-sm-3 control-label">Enter your coupon here</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
                  <span class="input-group-btn">
                  <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                  </span></div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-voucher">Use Gift Voucher <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div class="panel-collapse collapse" id="collapse-voucher">
              <div class="panel-body">
                <label for="input-voucher" class="col-sm-3 control-label">Enter your gift voucher code here</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="input-voucher" placeholder="Enter your gift voucher code here" value="" name="voucher">
                  <span class="input-group-btn">
                  <input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-voucher" value="Apply Voucher">
                  </span> </div>
              </div>
            </div>
          </div>
        </div> --}}
        <br>
        <div class="row" id="calculation">
          <div class="col-sm-4 col-sm-offset-8">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td class="text-right"><strong>Sub-Total:</strong></td>
                  <td class="text-right">{{ $total_price }} Taka</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>VAT (15%):</strong></td>
                  @php
                      $vat=15/100;
                      $vat_amount=$vat* $total_price;
                  @endphp
                  <td class="text-right">
                    
                  {{ $vat_amount }} Taka</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>Total:</strong></td>
                  <td class="text-right">{{ $total_price + $vat_amount }} Taka</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="buttons">
          <div class="pull-left"><a class="btn btn-default" href="{{ route('shop') }}">Continue Shopping</a></div>
          <div class="pull-right"><a class="btn btn-primary" href="{{ route('checkout') }}">Checkout</a></div>
        </div>
      @else
        <div class="row alert alert-warning">
          <strong>There is no item in your cart.</strong>
          <br>
        </div>
        <div class="buttons">
          <div class="pull-left"><a class="btn btn-default" href="{{ route('shop') }}">Continue Shopping</a></div>
         
        </div>
    @endif
      </div>
    </div>
  </div>
  
    

@endsection   
<!--end section--> 

@section('script')

<script type="text/javascript">

function cart_delete() {

$('.btn-cart-delete').on("click", function (e) { 
    // alert('ok');
  let cart_id = $(this).attr("id");
    console.log(cart_id);
    var url = "{{ url('/') }}";
      $.ajax({
          type: "Post",
          url: url+"/api/carts/delete/"+cart_id,
          data: {
              cart_id:cart_id,
          },
          
          success: function (data) {
            //let $rout = '{{ route('carts') }}';
              alert(`Cart update successfully !!`);
              location.reload();
              $("#changeid").load(" #changeid > *");
              $("#update_table_id").load(" #update_table_id > *");
              $("#cart_tale_id").load(" #cart_tale_id > *");
              $("#cart-total").html(data.totalItems);
              //setTimeout(worker, 2000);
              // $('#exampleModalCenter').modal('show')
              // data = JSON.parse(data);
              //if(data == 'success'){
              //     // toast
              //     alertify.set('notifier','position', 'top-center');
              //     alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
              //     $("#totalItems").html(data.totalItems);
              //}
          }
    });

    if(cart_id<=0){
      $( "#calculation" ).hide();

    };
  });
 
};
  //add to cart management 
// $(document).ready(function(){

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });     

    function update(){
        $('.btn-cart-submit').on("click",function (e) { 
          // alert('ok');
        let cart_id = $(this).attr("id");
          console.log(cart_id);
        $("#product_quantity").val(cart_id);

          let product_quantity= $("#product_quantity_"+cart_id).val();
            console.log(product_quantity);
          var url = "{{ url('/') }}";
            $.ajax({
                type: "Post",
                url: url+"/api/carts/update/"+cart_id,
                data: {
                    cart_id:cart_id,
                    product_quantity:product_quantity,
                },
                
                success: function (data) {
                  //let $rout = '{{ route('carts') }}';
                    alert(`Cart update successfully !!`);
                    location.reload();
                    $("#changeid").load(" #changeid > *");
                    $("#update_table_id").load(" #update_table_id > *");
                    $("#cart_tale_id").load(" .product_quantity > *");
                    cart_tale_id
                    //$("#content").load(" #content > *");
                    $("#cart-total").html(data.totalItems);
                    
                    // $('#exampleModalCenter').modal('show')
                    // data = JSON.parse(data);
                    //if(data == 'success'){
                    //     // toast
                    //     alertify.set('notifier','position', 'top-center');
                    //     alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
                    //     $("#totalItems").html(data.totalItems);
                    //}
                }
          });
        });

    };

    update();

    cart_delete();

// });


</script>
@endsection