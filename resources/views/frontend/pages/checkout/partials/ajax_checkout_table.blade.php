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
                <input type="hidden" id="hidden_sub_total" value="{{ $sub_total }}">
                <td class="text-right"><b id="sub_total">{{ $sub_total }}</b> Taka</td>
            </tr>
            <tr>
                <td class="text-right" data-toggle="tooltip" data-placement="top" title="Pleace select shipping region to see total price" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                <td class="text-right"><b id="shipping_cost"></b>Taka</td>
            </tr>
            <tr>
                <td class="text-right" colspan="4"><strong>Total:</strong></td>
                <td class="text-right total_amount" id=""  data-toggle="tooltip" data-placement="top" title="add shipping region in shipping section"><b id="total"></b> Taka</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="buttons">
        <div class="pull-right">
            <input type="button" data-loading-text="Loading..." class="btn btn-primary" id="button-confirm" value="Confirm Order" data-toggle="tooltip" data-placement="top" title="please fill up all bill and shipping infromation">
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