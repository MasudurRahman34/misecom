
<div class="col-sm-8 col-xs-6 header-right" >
    <div id="cart" class="btn-group ">
        <a href="{{ route('carts', ['id'=>'carts']) }}">
            {{-- <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button" >view cart</i></button> --}}
        </a>    
        <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button" style="color: tomato">
            <div id="changeid"><i class="fa fa-refresh fa-spin"></i> <span id="cart-total" style="color: red ">{{ App\Models\Frontend\Cart::totalItems() }} item(s) in cart</span></div>
            
        </button> 
        <ul class="dropdown-menu pull-right cart-dropdown-menu" id="ajax_header_cart">
            
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
         <li ><a href="{{ route('wishlist', ['id'=>'wishlist']) }}" id="wishlist-total" title="Wish List (0)"><i class="fa fa-heart" style="color: red"></i> <span>Wish List</span><span> ({{ App\Models\Frontend\Wishlist::totalWishlist() }})</span></a></li>
         @guest
         <li class="dropdown">
             <a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span>My Account</span> </a>
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
   
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="fa fa-caret-down"></i>
                      {{ __('Logout') }}
                  </a>
   
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>

                  <a class="dropdown-item" href=""> <i class="fa fa-caret-down"></i>
                   {{ __('Profile') }} 
                  </a>
                  
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
