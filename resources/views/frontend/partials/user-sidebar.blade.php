<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>

        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="{{ route('shop', ['id'=>'shop']) }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">E-Shop</span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/admin/dashboard', []) }}">
                            <span class="pcoded-mtext">Home</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Order</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('orderindex.user', []) }}">
                            <span class="pcoded-mtext">Manage Order</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            {{-- <li class="nav-item dropdown">
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
                    
                    <a class="dropdown-item" href="{{ route('orderindex.user', []) }}"> <i class="fa fa-caret-down"></i>
                      {{ __('Your orders') }} 
                     </a>
                </div>
            </li> --}}

        </ul>
   
    </div>
</nav>