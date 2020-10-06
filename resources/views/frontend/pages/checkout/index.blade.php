@extends('frontend.layouts.shop')
<!--start section -->
@section('title')
<title>App</title>    
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
  <li><a href="index.html"><i class="fa fa-home"></i></a></li>
  <li><a href="cart.html">Shopping Cart</a></li>
  <li><a href="checkout.html">Checkout</a></li>
</ul>
@endsection
@section('shop-content')
    
{{-- <div class="container"> --}}
    
     {{-- siad-bar --}}
     @include('frontend.partials.sidebar')
     {{-- end siad-bar --}}
    <div class="row">
      <div class="col-md-8" id="content">
        <h1>Checkout</h1>
        <div id="accordion" class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-option" aria-expanded="false">Step 1: Checkout Options <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div id="collapse-checkout-option" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <div class="row">
                  <div class="col-sm-6">
                    <h2>New Customer</h2>
                    <p>Checkout Options:</p>
                    <div class="radio">
                      <label>
                        <input type="radio" checked="checked" value="register" name="account">
                        Register Account</label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" value="guest" name="account">
                        Guest Checkout</label>
                    </div>
                    <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                    <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-account" value="Continue">
                  </div>
                  <div class="col-sm-6">
                    <h2>Returning Customer</h2>
                    <p>I am a returning customer</p>
                    <div class="form-group">
                      <label for="input-email" class="control-label">E-Mail</label>
                      <input type="text" class="form-control" id="input-email" placeholder="E-Mail" value="" name="email">
                    </div>
                    <div class="form-group">
                      <label for="input-password" class="control-label">Password</label>
                      <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                      <a href="http://localhost/opc001/index.php?route=account/forgotten">Forgotten Password</a></div>
                    <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-login" value="Login">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-address" aria-expanded="false">Step 2: Billing Details <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div id="collapse-payment-address" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <form class="form-horizontal">
                  <div class="radio">
                    <label>
                      <input type="radio" checked="checked" value="existing" name="payment_address" data-id="payment-existing">
                      I want to use an existing address</label>
                  </div>
                  <div id="payment-existing">
                    <select class="form-control" name="address_id">
                      <option selected="selected" value="4">mahi mahi, dasd, adsasd, Al Hasakah, Syrian Arab Republic</option>
                    </select>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" value="new" name="payment_address" data-id="payment-new">
                      I want to use a new address</label>
                  </div>
                  <br>
                  <div id="payment-new"  style="display: none;">
                    <div class="form-group required">
                      <label for="input-payment-firstname" class="col-sm-2 control-label">First Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-payment-firstname" placeholder="First Name" value="" name="firstname">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-payment-lastname" class="col-sm-2 control-label">Last Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="" name="lastname">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="input-payment-company" class="col-sm-2 control-label">Company</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-payment-company" placeholder="Company" value="" name="company">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-payment-address-1" class="col-sm-2 control-label">Address 1</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-payment-address-1" placeholder="Address 1" value="" name="address_1">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="input-payment-address-2" class="col-sm-2 control-label">Address 2</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-payment-address-2" placeholder="Address 2" value="" name="address_2">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-payment-city" class="col-sm-2 control-label">City</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-payment-city" placeholder="City" value="" name="city">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="input-payment-postcode" class="col-sm-2 control-label">Post Code</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-payment-postcode" placeholder="Post Code" value="" name="postcode">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-payment-country" class="col-sm-2 control-label">Country</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="input-payment-country" name="country_id">
                          <option value=""> --- Please Select --- </option>
                          <option value="244">Aaland Islands</option>
                          <option value="1">Afghanistan</option>
                          <option value="2">Albania</option>
                          <option value="3">Algeria</option>
                          <option value="4">American Samoa</option>
                          <option value="5">Andorra</option>
                          <option value="6">Angola</option>
                          <option value="7">Anguilla</option>
                          <option value="8">Antarctica</option>
                          <option value="9">Antigua and Barbuda</option>
                          <option value="10">Argentina</option>
                          <option value="11">Armenia</option>
                          <option value="12">Aruba</option>
                          <option value="252">Ascension Island (British)</option>
                          <option value="13">Australia</option>
                          <option value="14">Austria</option>
                          <option value="15">Azerbaijan</option>
                          <option value="16">Bahamas</option>
                          <option value="17">Bahrain</option>
                          <option value="18">Bangladesh</option>

                        </select>
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-payment-zone" class="col-sm-2 control-label">Region / State</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="input-payment-zone" name="zone_id">
                          <option value=""> --- Please Select --- </option>
                          <option selected="selected" value="3121">Al Hasakah</option>
                          <option value="3122">Al Ladhiqiyah</option>
                          <option value="3123">Al Qunaytirah</option>
                          <option value="3124">Ar Raqqah</option>
                          <option value="3125">As Suwayda</option>
                          <option value="3126">Dara</option>
                         
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="buttons clearfix">
                    <div class="pull-right">
                      <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-payment-address" value="Continue">
                    </div>
                  </div>
                </form>

                <script type="text/javascript">

                  $('input[name=\'payment_address\']').on('change', function() {
                      if (this.value == 'new') {
                          $('#payment-existing').hide();
                          $('#payment-new').show();
                      } else {
                          $('#payment-existing').show();
                          $('#payment-new').hide();
                      }
                  });
  
              </script> 

              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-shipping-address" aria-expanded="false">Step 3: Delivery Details <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div id="collapse-shipping-address" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <form class="form-horizontal">
                  <div class="radio">
                    <label>
                      <input type="radio" checked="checked" value="existing" name="shipping_address">
                      I want to use an existing address</label>
                  </div>
                  <div id="shipping-existing" >
                    <select class="form-control" name="address_id">
                      <option selected="selected" value="4">mahi mahi, dasd, adsasd, Al Hasakah, Syrian Arab Republic</option>
                    </select>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" value="new" name="shipping_address">
                      I want to use a new address</label>
                  </div>
                  <br>
                  <div id="shipping-new" style="display: none;">
                    <div class="form-group required">
                      <label for="input-shipping-firstname" class="col-sm-2 control-label">First Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-shipping-firstname" placeholder="First Name" value="" name="firstname">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-shipping-lastname" class="col-sm-2 control-label">Last Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-shipping-lastname" placeholder="Last Name" value="" name="lastname">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="input-shipping-company" class="col-sm-2 control-label">Company</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-shipping-company" placeholder="Company" value="" name="company">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-shipping-address-1" class="col-sm-2 control-label">Address 1</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-shipping-address-1" placeholder="Address 1" value="" name="address_1">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="input-shipping-address-2" class="col-sm-2 control-label">Address 2</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-shipping-address-2" placeholder="Address 2" value="" name="address_2">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-shipping-city" class="col-sm-2 control-label">City</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-shipping-city" placeholder="City" value="" name="city">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="input-shipping-postcode" class="col-sm-2 control-label">Post Code</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-shipping-postcode" placeholder="Post Code" value="123456" name="postcode">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-shipping-country" class="col-sm-2 control-label">Country</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="input-shipping-country" name="country_id">
                          <option value=""> --- Please Select --- </option>
                          <option value="244">Aaland Islands</option>
                          <option value="1">Afghanistan</option>
                          <option value="2">Albania</option>
                          <option value="3">Algeria</option>
                       
                          <option value="239">Zimbabwe</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-shipping-zone" class="col-sm-2 control-label">Region / State</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="input-shipping-zone" name="zone_id">
                          <option value=""> --- Please Select --- </option>
                          <option selected="selected" value="3121">Al Hasakah</option>
                          <option value="3122">Al Ladhiqiyah</option>
                          <option value="3123">Al Qunaytirah</option>
                          <option value="3124">Ar Raqqah</option>
                          <option value="3125">As Suwayda</option>
                          <option value="3126">Dara</option>
                          <option value="3127">Dayr az Zawr</option>
                          <option value="3128">Dimashq</option>
                          <option value="3129">Halab</option>
                          <option value="3130">Hamah</option>
                          <option value="3131">Hims</option>
                          <option value="3132">Idlib</option>
                          <option value="3133">Rif Dimashq</option>
                          <option value="3134">Tartus</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="buttons clearfix">
                    <div class="pull-right">
                      <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-shipping-address" value="Continue">
                    </div>
                  </div>
                </form>
                <script type="text/javascript">


                $('input[name=\'shipping_address\']').on('change', function() {
                    if (this.value == 'new') {
                        $('#shipping-existing').hide();
                        $('#shipping-new').show();
                    } else {
                        $('#shipping-existing').show();
                        $('#shipping-new').hide();
                    }
                });
                </script> 
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-shipping-method" aria-expanded="false">Step 4: Delivery Method <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div id="collapse-shipping-method" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <p>Please select the preferred shipping method to use on this order.</p>
                {{-- <p><strong>Flat Rate</strong></p>
                <div class="radio">
                  <label>
                    <input type="radio" checked="checked" value="flat.flat" name="shipping_method">
                    Flat Shipping Rate - $5.00</label>
                </div> --}}
                <p><strong>Add Comments About Your Order</strong></p>
                <p>
                  <textarea class="form-control" rows="8" name="comment"></textarea>
                </p>
                <div class="buttons">
                  <div class="pull-right">
                    <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-shipping-method" value="Continue">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-method" aria-expanded="false">Step 5: Payment Method <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div id="collapse-payment-method" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <p>Please select the preferred payment method to use on this order.</p>
                <div class="radio">
                  <label>
                    <input type="radio" checked="checked" value="cod" name="payment_method">
                    Cash On Delivery </label>
                </div>
                <p><strong>Add Comments About Your Order</strong></p>
                <p>
                  <textarea class="form-control" rows="8" name="comment"></textarea>
                </p>
                <div class="buttons">
                  <div class="pull-right">I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a>
                    <input type="checkbox" value="1" name="agree">
                    &nbsp;
                    <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-payment-method" value="Continue">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-confirm" aria-expanded="true">Step 6: Confirm Order <i class="fa fa-caret-down"></i></a></h4>
            </div>
          
              <div id="collapse-checkout-confirm" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="panel-body">
                  @if  (App\Models\Frontend\Cart::totalItems() > 0)
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <td>no</td>
                          <td class="text-left">Product Name</td>
                          <td class="text-right">Quantity</td>
                          <td class="text-right">Unit Price</td>
                          <td class="text-right">Total</td>
                        </tr>
                      </thead>

                     

                            <tbody>
                              @php
                              $total_price = 0;
                              @endphp
                                @foreach (App\Models\Frontend\Cart::totalCarts() as $cart)
                                  <tr>
                                    <td>  {{ $loop->index + 1 }}</td>
                                    <td class="text-left"><a href="">{{ $cart->product->product_title }}</a></td>
                                  
                                    <td class="text-right">  x {{  $cart->product_quantity  }}  </td>
                                    <td class="text-right">  {{ $cart->product->Price }} Taka  </td>
                                    <td class="text-right"> 
                                        @php
                                        $total_price += $cart->product->Price * $cart->product_quantity;
                                        @endphp
                        
                                        {{ $cart->product->Price * $cart->product_quantity }} Taka
                                    </td>
                                  </tr>
                                @endforeach
                          </tbody>
                            <tfoot>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Sub-Total + vat(15%):</strong></td>
                                @php
                                $vat=15/100;
                                $vat_amount=$vat* $total_price;
                                  $sub_total = $total_price + $vat_amount;
                                    $shipping_rate=50;
                                      $total= $sub_total+$shipping_rate;
                                @endphp

                                <td class="text-right">{{ $sub_total }} Taka</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                                <td class="text-right">50.00 Taka</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Total:</strong></td>
                                <td class="text-right total_amount" id="{{ $total }}" >{{ $total }}</td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                        <div class="buttons">
                          <div class="pull-right">
                            <input type="button" data-loading-text="Loading..." class="btn btn-primary" id="button-confirm" value="Confirm Order">
                          </div>
                        </div>
                      @else
                      <div class="row alert alert-warning">
                        <strong>There is no item in your cart.</strong>
                        <br>
                      </div>
                      <div class="buttons">
                        <div class="pull-left"><a class="btn btn-default" href="{{ route('shop') }}">Continue Shopping</a></div>
                      </div>
                      <br/>
                    @endif
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
 
  

@endsection   
<!--end section--> 

@section('script')
<script type="text/javascript">
$(document).ready(function () {
        //set ajax token
       $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          }
          });  
        function checkout(){
          //set submit-button
          $('#button-confirm').click(function (e) { 
            e.preventDefault();
              let total_amount = $('.total_amount').attr('id'); 
                console.log(total_amount);
                //set Url
                let url = "{{ url('/') }}";

                  //set ajax for post request

                $.ajax({
                  type: "post",
                  url: url+"/checkout/store/",
                  data:{
                      total_amount:total_amount,
                  },
                
                  success: function (response) {
                    console.log(response);
                    if(response){
                      alert('your order is complate. Thank You');
                      location.reload();
                    }
                    
                  }
                });
              });  
            };
        checkout();    

});

</script>   
@endsection