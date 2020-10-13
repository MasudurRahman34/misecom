@extends('frontend.layouts.shop')
<!--start section -->
@section('title')
<title>E-Shop Wishlist</title>    
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
  <li><a href="index.html"><i class="fa fa-home"></i></a></li>
  <li><a href="">Shoping Cart</a></li>
  <li><a href="">Wishlist</a></li>
  <li>Shopping Cart  | My Wishlist Items:  @if  (App\Models\Frontend\Wishlist::totalWishlist() > 0)  {{ App\Models\Frontend\Wishlist::totalWishlist() }}</li>
</ul>
@endsection
@section('shop-content')

@include('frontend.partials.sidebar')
    <div class="row justify-content-start">
      <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-auto" id="content">
        <h1></h1>
       <hr>
          <div class="table-responsive" id="cart_tale_id">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td>#</td>
                  <td class="text-center">Image</td>
                  <td class="text-left">Product Name</td>
                  <td class="text-left">Add</td>
                  <td class="text-left">Delete</td>
                 
                 
                </tr>
              </thead>
              <tbody>
                @php
                $total_price = 0;
                @endphp
                  @foreach (App\Models\Frontend\Wishlist::Wishlists() as $wishlist)
                <tr>
                  <td>
                    {{ $loop->index + 1 }}
                  </td>
                  {{-- @if ($wishlist->product->images->count() > 0)
                  <img src="{{ asset('images/products/'. $wishlist->product->images->first()->image) }}" width="60px">
                  @else
                  <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="iPhone" alt="iPhone" src="{{ asset('frontend/image/product/2product50x59.jpg') }}"></a></td>
                  @endif --}}
                  <td class="text-center" style="max-width: 130px;"><a href="product.html"><img style="max-width: 75%; class="img-thumbnail" title="iPhone" alt="iPhone" src="{{ asset('frontend/image/product/product.jpg') }}"></a></td>
                  {{-- {{ route('products.show', $wishlist->product->slug) }} --}}

                  <td class="text-left"><a href="{{ route('product.show',[$wishlist->product->slug] ) }}" >{{ $wishlist->product->product_title }}</a></td>
                  <td class="text-left">
                    
                        <button type="button" style="color: orang" class="btn btn-primary addtocart addtocart-btn" id="{{ $wishlist->product->id }}" value="{{ $wishlist->product->id }}" >Add to Bag </button>

                  
                  </td>
                  <td class="text-left">
                    
                    <button type="button" class="btn btn-danger btn-wishlist-delete" id="{{ $wishlist->id }}" value="{{ $wishlist->id }}" ><i class="fa fa-times" aria-hidden="true"></i> Delete </button>

              
              </td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        <br>
     
        <div class="buttons">
          <div class="pull-left"><a class="btn btn-default" href="{{ route('shop') }}">Continue Shopping</a></div>
          <div class="pull-right"><a class="btn btn-primary" href="{{ route('checkout') }}">Checkout</a></div>
        </div>
      @else
        <div class="row alert alert-warning">
          <strong>There is no item in your Wishlist.</strong>
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