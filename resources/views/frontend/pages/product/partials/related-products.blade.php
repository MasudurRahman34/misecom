
    <div id="tab-bestseller" class="tab-content">
        <div class="box">
            <div id="bestseller-slidertab" class="row owl-carousel product-slider">
               
    
                    @foreach ($Product_category as $product)
                        <div class="item">
                            <div class="product-thumb transition">
                                <div class="image product-imageblock"> <a href="{{ route('product.show',[$product->slug] ) }}"><img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                                    <div class="button-group">
                                        <button type="button" class="wishlist wishlist-btn" id="{{ $product->id }}" value="{{ $product->id }}" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                                        <button type="button" class="addtocart-btn" id="{{ $product->id }}" value="{{ $product->id }}" >Add to Bag </button>
                                        <input type="hidden"  id="addtocarthidden">
                                        <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                                <div class="caption product-detail">
                                    <h4 class="product-name"><a href="#" title="iPod Classic">{{ $product->product_title }}</a></h4>
                                    <p class="price product-price"> Taka {{ $product->offerPrice }}<span class="price-tax">Ex Tax: $100.00 </span></p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
               
    
                {{-- <div class="item">
                    <div class="product-thumb transition">
                        <div class="image product-imageblock"> <a href="product.html"> <img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPhone" title="iPhone" class="img-responsive" /> </a>
                            <div class="button-group">
                                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                                <button type="button" class="addtocart-btn" >Add to Cart</button>
                                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                        <div class="caption product-detail">
                            <h4 class="product-name"><a href="product.html" title="iPhone">iPhone</a></h4>
                            <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                        </div>
                        <div class="button-group">
                            <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                            <button type="button" class="addtocart-btn" >Add to Cart</button>
                            <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-thumb transition">
                        <div class="image product-imageblock"> <a href="product.html"> <img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPhone" title="iPhone" class="img-responsive" /> </a>
                            <div class="button-group">
                                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                                <button type="button" class="addtocart-btn" >Add to Cart</button>
                                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                        <div class="caption product-detail">
                            <h4 class="product-name"><a href="product.html" title="iPhone">iPhone</a></h4>
                            <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                        </div>
                        <div class="button-group">
                            <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                            <button type="button" class="addtocart-btn" >Add to Cart</button>
                            <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-thumb transition">
                        <div class="image product-imageblock"> <a href="product.html"> <img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPhone" title="iPhone" class="img-responsive" /> </a>
                            <div class="button-group">
                                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                                <button type="button" class="addtocart-btn" >Add to Cart</button>
                                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                        <div class="caption product-detail">
                            <h4 class="product-name"><a href="product.html" title="iPhone">iPhone</a></h4>
                            <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                        </div>
                        <div class="button-group">
                            <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                            <button type="button" class="addtocart-btn" >Add to Cart</button>
                            <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-thumb transition">
                        <div class="image product-imageblock"> <a href="product.html"> <img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPhone" title="iPhone" class="img-responsive" /> </a>
                            <div class="button-group">
                                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                                <button type="button" class="addtocart-btn" >Add to Cart</button>
                                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                        <div class="caption product-detail">
                            <h4 class="product-name"><a href="product.html" title="iPhone">iPhone</a></h4>
                            <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                        </div>
                        <div class="button-group">
                            <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                            <button type="button" class="addtocart-btn" >Add to Cart</button>
                            <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

