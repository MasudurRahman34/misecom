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

    <div class="row justify-content-center" id="divid">
      <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-auto" id="content">
         <div id="accordion" class="panel-group">
          
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-address" aria-expanded="false">Step 2: Billing Details <i class="fa fa-caret-down"></i></a></h4>
              </div>
              <div id="collapse-payment-address" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                  <form class="form-horizontal">
                    <div class="radio">
                      <label>
                        <input type="radio" value="new" name="payment_address" data-id="payment-new">
                        I want to use a new address</label>
                    </div>
                    <br>

                    <div id="payment-new"  style="">
                      <div class="form-group required">
                        <label for="input-payment-name" class="col-sm-2 control-label"> Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Billing_Details_name" placeholder=" Name" value="" name="Billing_Details_name">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-payment-address-1" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Billing_Details_address" placeholder="Address" value="" name="Billing_Details_address">
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="input-payment-address-1" class="col-sm-2 control-label">Contact Number </label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" id="Billing_Details_contact_number" placeholder="contact Number" value="" name="Billing_Details_contact_number">
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="input-payment-city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Billing_Details_city" placeholder="City" value="" name="Billing_Details_city">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-payment-zone" class="col-sm-2 control-label">Region</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="Billing_Details_zone_id" name="Billing_Details_zone_id">
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
                  </form>
                </div>
              </div>
            </div>
            {{-- delivery-adderss --}}
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-shipping-address" aria-expanded="false">Step 3: shipping Details <i class="fa fa-caret-down"></i></a></h4>
              </div>
              <div id="collapse-shipping-address" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body" >
                  {{-- ajax_checkout_table --}}
                       
                 
                  <form class="form-horizontal">
                    
                    <div class="radio">
                      <label>
                        <input type="radio" value="new" name="shipping_address">
                        I want to use a new address</label>
                    </div>
                    <br>
                    <div id="shipping-new" style="">
                      <div class="form-group required">
                        <label for="input-shipping-zone" class="col-sm-3 control-label">Region / State</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="Delivery_Details_zone_id" name="Delivery_Details_zone_id">
                            <option value="">please select you shipping location</option>
                            @foreach ($regions as $region)

                              <option value="{{$region->id}}" id="{{$region->id}}" data-id="{{ $region->shipping_cost }}">{{$region->region_name}}</option>
                            @endforeach
                            
                          </select>
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-shipping-lastname" class="col-sm-3 control-label"> Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Delivery_Details_name" placeholder="Name" value="" name="Delivery_Details_name">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-shipping-address-1" class="col-sm-3 control-label">Address 1</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Delivery_Details_address_1" placeholder="Address 1" value="" name="Delivery_Details_address_1">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="input-shipping-address-2" class="col-sm-3 control-label">Address 2</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Delivery_Details_address_2" placeholder="Address 2" value="" name="Delivery_Details_address_2">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-shipping-phone_number" class="col-sm-3 control-label"> Contact Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Delivery_Details_phone_number" placeholder="Contact number" value="" name="Delivery_Details_phone_number">
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="input-shipping-email" class="col-sm-3 control-email"> email (Optional)</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="Delivery_Details_emailAddress" placeholder="your email" value="" name="Delivery_Details_emailAddress">
                        </div>
                      </div>

                     
                    
                     
                      <div class="form-group required">
                        <label for="input-shipping-city" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Delivery_Details_city" placeholder="City" value="" name="Delivery_Details_city">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="input-shipping-postcode" class="col-sm-3 control-label">Post Code</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Delivery_Details_postcode" placeholder="Post Code" value="" name="Delivery_Details_postcode">
                        </div>
                      </div>
                      {{-- <div class="form-group required">
                        <label for="input-shipping-country" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="input-shipping-country" name="Delivery Details_country_id">
                            <option value=""> --- Please Select --- </option>
                            <option value="244">Aaland Islands</option>
                            <option value="1">Afghanistan</option>
                            <option value="2">Albania</option>
                            <option value="3">Algeria</option>
                        
                            <option value="239">Zimbabwe</option>
                          </select>
                        </div>
                      </div> --}}
                      
                    </div>
                  </form>
               

                </div>
              </div>
            </div>
            {{-- payment-option --}}
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-method" aria-expanded="false">Step 5: Payment Method <i class="fa fa-caret-down"></i></a></h4>
              </div>
              <div id="collapse-payment-method" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                  <p>Please select the preferred payment method to use on this order.</p>
                  <div class="radio">
                    <label>
                      <input type="radio" checked="checked" value="Cash on Delivery" name="payment_method" id="payment_method">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- confirm order --}}
            <div class="panel panel-default" id="ajax_checkout_table">
              <div class="panel-heading">
                <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-confirm" aria-expanded="true">Step 6: Confirm Order <i class="fa fa-caret-down"></i></a></h4>
              </div>
                <div id="collapse-checkout-confirm" class="panel-collapse collapse in" aria-expanded="true" style="">
                  <div class="panel-body"  id="ajax_checkout_product_cost"> 
                    {{-- start-ajax_checkout_table --}}

                   
                    {{-- end-ajax_checkout_table --}}
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

// $("#Delivery_Details_zone_id").on('change', function() {
//   var price $(this).attr("#data-id");
//   alert('change');
// });



</script>   
@endsection