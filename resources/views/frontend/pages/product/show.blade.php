@extends('frontend.layouts.shop')
<!--start section -->
@section('title')
<title>eshop|Single-Product</title>    
@endsection

@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('shop') }}"><i class="fa fa-home"></i></a></li>
    <li><a href="{{ route('shop', ['id'=>'shop']) }}">Shop</a></li>
    <li><a href="#">Product Details</a></li>
</ul>
@endsection

@section('shop-content')

<div id="content" class="col-sm-8">
    <div class="row">
        <div class="col-sm-6">
            <ul class="thumbnails">
                <li><a class="thumbnail fancybox" href="{{ asset('frontend/image/product/product8.jpg') }}" title="iPod Classic"><img src="{{ asset('frontend/image/product/product1.jpg') }}" title="iPod Classic" alt="iPod Classic" /></a></li>
                <div id="product-thumbnail" class="owl-carousel">
                    <div class="item">
                        <li class="image-additional"><a class="thumbnail fancybox" rel="gallery1"  href="{{ asset('frontend/image/product/product1.jpg') }}" title="iPod Classic"> <img src="{{ asset('frontend/image/product/pro-1-220x294.jpg') }}" title="iPod Classic" alt="iPod Classic" /></a></li>
                    </div>
                    <div class="item">
                        <li class="image-additional"><a class="thumbnail fancybox" rel="gallery1" href="{{ asset('frontend/image/product/product2.jpg') }}" title="iPod Classic"> <img src="{{ asset('frontend/image/product/pro-2-220x294.jpg') }}" title="iPod Classic" alt="iPod Classic" /></a></li>
                    </div>
                    <div class="item">
                        <li class="image-additional"><a class="thumbnail fancybox" rel="gallery1" href="{{ asset('frontend/image/product/product3.jpg') }}" title="iPod Classic"> <img src="{{ asset('frontend/image/product/pro-3-220x294.jpg') }}" title="iPod Classic" alt="iPod Classic" /></a></li>
                    </div>
                    <div class="item">
                        <li class="image-additional"><a class="thumbnail fancybox" rel="gallery1" href="{{ asset('frontend/image/product/product4.jpg') }}" title="iPod Classic"> <img src="{{ asset('frontend/image/product/pro-4-220x294.jpg') }}" title="iPod Classic" alt="iPod Classic" /></a></li>
                    </div>
                    <div class="item">
                        <li class="image-additional"><a class="thumbnail fancybox" rel="gallery1" href="{{ asset('frontend/image/product/product5.jpg') }}" title="iPod Classic"> <img src="{{ asset('frontend/image/product/pro-5-220x294.jpg') }}" title="iPod Classic" alt="iPod Classic" /></a></li>
                    </div>
                    <div class="item">
                        <li class="image-additional"><a class="thumbnail fancybox" rel="gallery1" href="{{ asset('frontend/image/product/product6.jpg') }}" title="iPod Classic"> <img src="{{ asset('frontend/image/product/pro-6-220x294.jpg') }}" title="iPod Classic" alt="iPod Classic" /></a></li>
                    </div>
                    <div class="item">
                        <li class="image-additional"><a class="thumbnail fancybox" rel="gallery1" href="{{ asset('frontend/image/product/product7.jpg') }}" title="iPod Classic"> <img src="{{ asset('frontend/image/product/pro-7-220x294.jpg') }}" title="iPod Classic" alt="iPod Classic" /></a></li>
                    </div>
                </div>
            </ul>
        </div>
        <div class="col-sm-6">
            <h1 class="productpage-title">{{ $product->product_title }}</h1>
            <div class="rating product"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="review-count"> <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">1 reviews</a> / <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a></span>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" ></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
                <script type="text/javascript" src="../s7.addthis.com/js/300/addthis_widget.html#pubid=ra-515eeaf54693130e"></script> 
                <!-- AddThis Button END --> 
            </div>
            <ul class="list-unstyled productinfo-details-top">
                <li>
                    <h2 class="productpage-price">Taka: {{ $product->offerPrice }}</h2>
                </li>
                <li><span class="productinfo-tax">Ex Tax: 15%</span></li>
            </ul>
            <hr>
            <ul class="list-unstyled product_info">
                <li>
                    <label>Brand:</label>
                    <span> <a href="#">{{ $product->brand->name }}</a></span></li>
                <li>
                    <label>Product Code:</label>
                    <span> product {{ $product->id }}</span></li>
                <li>
                    <label>Availability:</label>
                    <span> {{ $product->stockAmount  < 1 ? 'No Item is Available' : $product->stockAmount.' in stock' }} </span></li>
            </ul>
            <hr>
            <p class="product-desc">{{ $product->product_description }} </p>
                {{-- <div class="form-group">
                    <label class="control-label qty-label" for="input-quantity">size</label>
                    <input type="size" name="size" value="" size="3" id="input-quantity" class="form-control productpage-size my-2" />
                </div> --}}
                <br>
            <div id="product">
                
                <div class="form-group">
                    <label class="control-label qty-label" for="input-quantity">Qty</label>
                    <input type="number" name="quantity" value="1" size="2" id="input-quantity" class="form-control productpage-qty"  min="1"/>
                    
                    <input type="hidden" name="product_id" value="48" />
                    <div class="btn-group">
                        <button type="button" data-toggle="tooltip" class="btn btn-primary wishlist-btn"  id="{{ $product->id }}" value="{{ $product->id }}" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                        <button type="button" id="{{ $product->id }}" value="{{ $product->id }}" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block addtocart show-product-addtocart-btn">Add to Cart</button>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="productinfo-tab">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
            <li><a href="#tab-review" data-toggle="tab">Reviews (1)</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab-description">
                <div class="cpt_product_description ">
                    <div>
                        <p> <strong>More room to move.</strong></p>
                        <p> With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.</p>
                        <p> <strong>Cover Flow.</strong></p>
                        <p> Browse through your music collection by flipping through album art. Select an album to turn it over and see the track list.</p>
                        <p> <strong>Enhanced interface.</strong></p>
                        <p> Experience a whole new way to browse and view your music and video.</p>
                        <p> <strong>Sleeker design.</strong></p>
                        <p> Beautiful, durable, and sleeker than ever, iPod classic now features an anodized aluminum and polished stainless steel enclosure with rounded edges.</p>
                    </div>
                </div>
                <!-- cpt_container_end --></div>
            <div class="tab-pane" id="tab-review">
                <form class="form-horizontal">
                    <div id="review"></div>
                    <h2>Write a review</h2>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-name">Your Name</label>
                            <input type="text" name="name" value="" id="input-name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-review">Your Review</label>
                            <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                            <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label">Rating</label>
                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                            <input type="radio" name="rating" value="1" />
                            &nbsp;
                            <input type="radio" name="rating" value="2" />
                            &nbsp;
                            <input type="radio" name="rating" value="3" />
                            &nbsp;
                            <input type="radio" name="rating" value="4" />
                            &nbsp;
                            <input type="radio" name="rating" value="5" />
                            &nbsp;Good</div>
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h3 class="productblock-title">Related Products</h3>
</div>
<div class="col-xl-8 col-md-12 col-sm-4 col">
    @include('frontend.pages.product.partials.category-wise-product')
</div>


@endsection

<!--end section--> 

@section('script')
   
@endsection
