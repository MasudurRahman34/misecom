
   
<div class="col-sm-8 col-xs-6 header-right" >
    
    <div id="cart" class="btn-group btn-block">
        <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button" style="color: tomato">
            <div id="changeid"><i class="fa fa-caret-down"></i> <span id="cart-total" style="color: red ">{{ App\Models\Frontend\Cart::totalItems() }} item(s) in cart</span></div>
            
        </button>
        <ul class="dropdown-menu pull-right cart-dropdown-menu">
            <li>
                @if  (App\Models\Frontend\Cart::totalItems() > 0)
                <table class="table table-striped" id="update_table_id">
                    <tbody>
                        {{-- <tr>
                            <td class="text-center"><a href="#"><img class="img-thumbnail" title="iPhone" alt="iPhone" src="{{ asset('frontend/image/product/7product50x59.jpg') }}"></a></td>
                            <td class="text-left"><a href="#">iPhone</a></td>
                            <td class="text-right">x 1</td>
                            <td class="text-right">$254.00</td>
                            <td class="text-center"><button class="btn btn-danger btn-xs" title="Remove" type="button"><i class="fa fa-times"></i></button></td> --}}


                            @php
                            $total_price = 0;
                            @endphp
                              @foreach (App\Models\Frontend\Cart::totalCarts() as $cart)
                            <tr>
                              
                              {{-- @if ($cart->product->images->count() > 0)
                              <img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" width="60px">
                              @else
                              <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="iPhone" alt="iPhone" src="{{ asset('frontend/image/product/2product50x59.jpg') }}"></a></td>
                              @endif --}}
                              <td class="text-center" style="max-width: 130px;"><a href=""> <img style="max-width: 75%; class="img-thumbnail" title="iPhone" alt="iPhone" src="{{ asset('frontend/image/product/product.jpg') }}"></a></td>
                              {{-- {{ route('products.show', $cart->product->slug) }} --}}
            
                              <td class="text-left"><a href="" >{{ $cart->product->product_title }}</a></td>  
                              <td class="text-right">x {{!! $cart->product_quantity !!}}</td>
                              <td class="text-right">{{ $cart->product->Price }} Taka</td>
                              <td class="text-center"><button class="btn btn-danger btn-cart-delete btn-xs"  id="{{ $cart->id }}" title="Remove" type="button"><i class="fa fa-times"></i></button></td>
                            </tr>
                            @php
                            $total_price += $cart->product->Price * $cart->product_quantity;
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
        </ul>
    </div>

    <ul class="list-inline pull-right " style=" padding-top: 5px;">
                            
        {{-- <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span>My Account</span> <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="register.html">Register</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </li> --}}
         <!-- Authentication Links -->
         <li ><a href="#" id="wishlist-total" title="Wish List (0)"><i class="fa fa-heart" style="color: red"></i> <span>Wish List</span><span> (0)</span></a></li>
         @guest
         <li class="dropdown">
             <a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span>My Account</span> <span class="caret"></span></a>
             <ul class="dropdown-menu dropdown-menu-right">
              <li class="nav-item dropdown">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>
   
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"><i class="fa fa-caret-down"></i>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
   
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>

                  <a class="dropdown-item" href=""> <i class="fa fa-caret-down"></i>
                   {{ __('Profile') }} 
                  </a>
                  <br>
                  <a class="dropdown-item" href=""> <i class="fa fa-caret-down"></i>
                    {{ __('Your orders') }} 
                   </a>

                
              </div>
              
              

             
               

          </li>
         

      @endguest
             </ul>
         </li>
        </ul>

    
    {{-- <div id="search" class="input-group">
        <input type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
        <span class="input-group-btn">
        <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
        </span> 
    </div> --}}
    
</div>
</div>
</div>
