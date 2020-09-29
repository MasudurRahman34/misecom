<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="top-left pull-left">
                    <div class="language">
                        <form action="#" method="post" enctype="multipart/form-data" id="language">
                            <div class="btn-group">
                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="{{ asset('frontend/image/flags/gb.png') }}" alt="English" title="English"> <i class="fa fa-caret-down"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><img src="frontend/image/flags/lb.png" alt="Arabic" title="Arabic"> Arabic</a></li>
                                    <li><a href="#"><img src="frontend/image/flags/gb.png" alt="English" title="English"> English</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <div class="currency">
                        <form action="#" method="post" enctype="multipart/form-data" id="currency">
                            <div class="btn-group">
                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"> <strong>$</strong> <i class="fa fa-caret-down"></i> </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
                                    </li>
                                    <li>
                                        <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
                                    </li>
                                    <li>
                                        <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ US Dollar</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="top-right pull-right">
                    <div id="top-links" class="nav pull-right">
                        <ul class="list-inline">
                            <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span>My Account</span> <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
                            <li><a href="#" id="wishlist-total" title="Wish List (0)"><i class="fa fa-heart"></i> <span>Wish List</span><span> (0)</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="header-inner">
        <div class="col-sm-4 col-xs-6 header-left">
        <div class="shipping">
                    <div class="shipping-img"></div>
                    <div class="shipping-text">Free Shipping <span class="shipping-detail">Free on all products</span></div>
                </div>
            
        </div>
        <div class="col-sm-4 col-xs-6 header-middle">
            <div class="header-middle-top">
                
                <div id="logo"> <a href="index.html"><img src="{{ asset('frontend/image/logo.png') }}" title="E-Commerce" alt="E-Commerce" class="img-responsive" /></a> </div>
            </div>
        </div>