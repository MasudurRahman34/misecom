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
                <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-shipping-address" aria-expanded="false">Step 3: Delivery Details <i class="fa fa-caret-down"></i></a></h4>
              </div>
              <div id="collapse-shipping-address" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                  <form class="form-horizontal">
                    
                    <div class="radio">
                      <label>
                        <input type="radio" value="new" name="shipping_address">
                        I want to use a new address</label>
                    </div>
                    <br>
                    <div id="shipping-new" style="">
                      <div class="form-group required">
                        <label for="input-shipping-lastname" class="col-sm-2 control-label"> Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Delivery_Details_name" placeholder="Name" value="" name="Delivery_Details_name">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-shipping-address-1" class="col-sm-2 control-label">Address 1</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Delivery_Details_address_1" placeholder="Address 1" value="" name="Delivery_Details_address_1">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="input-shipping-address-2" class="col-sm-2 control-label">Address 2</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Delivery_Details_address_2" placeholder="Address 2" value="" name="Delivery_Details_address_2">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label for="input-shipping-phone_number" class="col-sm-2 control-label"> Contact Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Delivery_Details_phone_number" placeholder="Contact number" value="" name="Delivery_Details_phone_number">
                        </div>
                      </div>

                      <div class="form-group required">
                        <label for="input-shipping-email" class="col-sm-2 control-email"> email (Optional)</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="Delivery_Details_emailAddress" placeholder="your email" value="" name="Delivery_Details_emailAddress">
                        </div>
                      </div>

                     
                    
                     
                      <div class="form-group required">
                        <label for="input-shipping-city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Delivery_Details_city" placeholder="City" value="" name="Delivery_Details_city">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="input-shipping-postcode" class="col-sm-2 control-label">Post Code</label>
                        <div class="col-sm-10">
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
                      <div class="form-group required">
                        <label for="input-shipping-zone" class="col-sm-2 control-label">Region / State</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="Delivery_Details_zone_id" name="Delivery_Details_zone_id">
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
                  <div class="panel-body" > 
                    {{-- start-ajax_checkout_table --}}
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
                                    <td class="text-right">  {{ $cart->product->offer_price }} Taka  </td>
                                    <td class="text-right"> 
                                        @php
                                        $total_price += $cart->product->offer_price * $cart->product_quantity;
                                        @endphp
                        
                                        {{ $cart->product->offer_price * $cart->product_quantity }} Taka
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
                                    <td class="text-right total_amount" id="{{ $total }}" >{{ $total }} Taka</td>
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
                            <strong>There is no item in your cart to checkout.</strong>
                                <br>
                        </div>
                        <div class="buttons">
                            <div class="pull-left"><a class="btn btn-default" href="{{ route('shop') }}">Continue Shopping</a></div>
                        </div>
                            <br/>
                    @endif
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
</script>   
@endsection