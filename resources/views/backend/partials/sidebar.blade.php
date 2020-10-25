<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>

        {{-- <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                    <span class="pcoded-mtext">Menu Levels</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Menu Level 2.1</span>
                        </a>
                    </li>
                    <li class="pcoded-hasmenu ">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Menu Level 2.2</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-mtext">Menu Level 3.1</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Menu Level 2.3</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="disabled">
                    <span class="pcoded-micon"><i class="feather icon-power"></i></span>
                    <span class="pcoded-mtext">Disabled Menu</span>
                </a>
            </li>
            <li class="">
                <a href="sample-page.htm">
                    <span class="pcoded-micon"><i class="feather icon-watch"></i></span>
                    <span class="pcoded-mtext">Sample Page</span>
                </a>
            </li>
        </ul> --}}


        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/admin', []) }}">
                            <span class="pcoded-mtext">Home</span>
                        </a>
                    </li>
                    {{-- <li class="">
                        <a href="{{ url('/admin/datatable') }}">
                            <span class="pcoded-mtext">data table</span>
                        </a>
                    </li> --}}
                    {{-- <li class="">
                        <a href="dashboard-crm.htm">
                            <span class="pcoded-mtext">CRM</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="dashboard-analytics.htm">
                            <span class="pcoded-mtext">Analytics</span>
                            <span class="pcoded-badge label label-info ">NEW</span>
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Section</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('section.list', []) }}">
                            <span class="pcoded-mtext">Manage Section</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Brand</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('brands.index', []) }}">
                            <span class="pcoded-mtext">Manage Brand</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
           

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">category</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('admin/categories', []) }}">
                            <span class="pcoded-mtext">Manage category</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Supplier</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('supplier.list', []) }}">
                            <span class="pcoded-mtext">Manage Supplier</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">product</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('products.index', []) }}">
                            <span class="pcoded-mtext">Manage product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.quantity.index', []) }}">
                            <span class="pcoded-mtext">Product Quantity</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('product.image')}}">
                        <span class="pcoded-mtext">Product Image</span>
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
                        <a href="{{ route('order.index', []) }}">
                            <span class="pcoded-mtext">Manage Order</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Shipping Region</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('region.index', []) }}">
                            <span class="pcoded-mtext">Manage Shipping Region</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
        </ul>
    </div>
</nav>