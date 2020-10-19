<li>
    @if  (App\Models\Frontend\Cart::totalItems() > 0)
    <table class="table table-striped" id="update_table_id">
        <tbody>
           

                @php
                $total_price = 0;
                @endphp
                  @foreach (App\Models\Frontend\Cart::totalCarts() as $cart)
                <tr>
                  <td class="text-center" style="max-width: 130px;"><a href=""> <img style="max-width: 75%; class="img-thumbnail" title="iPhone" alt="iPhone" src="{{ asset('img/product/'.$cart->product->product_images->first()->link) }}"></a></td>

                  <td class="text-left"><a href="" >{{ $cart->product->product_title }}</a></td>  
                  <td class="text-right">x {{!! $cart->product_quantity !!}}</td>
                  <td class="text-right">{{ $cart->product->offer_price }} Taka</td>
                  <td class="text-center"><button class="btn btn-danger btn-cart-delete btn-xs"  id="{{ $cart->id }}" title="Remove" type="button"><i class="fa fa-times"></i></button></td>
                </tr>
                @php
                $total_price += $cart->product->offer_price * $cart->product_quantity;
                @endphp
                @endforeach
            </tr>
        </tbody>
    </table>
</li>
<li>
    <div>
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
        <p class="text-right"> <span class="btn-viewcart"><a href="{{ route('carts', ['id'=>'carts']) }}"><strong><i class="fa fa-shopping-cart"></i> View Cart</strong></a></span> <span class="btn-checkout"><a href="{{ route('checkout', ['id'=>'checkout']) }}"><strong><i class="fa fa-share"></i> Checkout</strong></a></span> </p>
       
    @endif
   
    </div>
</li>