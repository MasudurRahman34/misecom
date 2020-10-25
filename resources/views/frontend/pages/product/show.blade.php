@extends('frontend.layouts.shop')
<!--start section -->
    @section('title')
        <title>eshop|Single-Product</title>    
    @endsection
    <!--end section--> 
    @section('styles')  

    @endsection
    <!--end section--> 
    @section('breadcrumb')
        <ul class="breadcrumb">
            <li><a href="{{ route('shop') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('shop', ['id'=>'shop']) }}">Shop</a></li>
            <li><a href="#">Product Details</a></li>
        </ul>
    @endsection
    <!--end section--> 
    @section('shop-content')
        <div class="row" id="content">
            <div  class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6 imagebox" id=""> 
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> 
                            <div class="carousel-inner img-hover-zoom">
                                
                                    {{-- need-change --}}
                                    @php $i = 1; @endphp
                                    @foreach ($product->product_images as $image)
                                        
                                            @if ($i > 0)   
                                                <div class="carousel-item active img-hover-zoom">
                                                    <img class="d-block w-100" src="{{ asset('img/product/'.$image->link ) }}" alt="{{ $product->product_title }}"> 
                                            @endif
                                        @php $i--; @endphp
                                        
                                    @endforeach
                                </div> 
                            </div>
                                {{-- need-change --}}
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>    
                        </div>
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
                                <h2 class="productpage-price"><del>৳: {{ $product->sell_price }}</del> &npar;  ৳: {{ $product->offer_price }}</h2>
                            </li>
                            <li><h3 class="productpage-price"> Discount: {{ $product->offer }}% </h3></li>
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
                                <b><span> {{ $product->stock  < 1 ? 'Out of stock' :' in stock' }} </span></b> </li>
                        </ul>
                        <hr>
                        <h2><label class="control-label " for=""><b> Product slug </b></label></h2>
        
                            <div class="cpt_product_description ">
                                <div>
                                <p> {{ $product->slug }}</p>
                                </div>
                            </div>            
                            {{-- <div class="form-group">
                                <label class="control-label qty-label" for="input-quantity">size</label>
                                <input type="size" name="size" value="" size="3" id="input-quantity" class="form-control productpage-size my-2" />
                            </div> --}}
                            <br>
        
                        
                        <div id="product">
        
                            
                                <label class="control-label qty-label" for="product_size">Size</label>
                                    <div class="form-group">
                                        <select class="custom-select" required id="product_size" name="product_size">
                                            <option value=""> select product size</option>
                                            @foreach ($product->product_variant as $option)
                                            <option value="{{$option->size}}" id="{{$option->quantity}}" >{{$option->size}}</option> 
                                            @endforeach
                                        </select>
                                        <hr>
                                        <div class="invalid-feedback">Select you product details</div>
                                    </div>
                            
                            
                            
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
            </div> 
            <div class="col-md-12"> 
                <div class="productinfo-tab">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
                        {{-- <li><a href="#tab-review" data-toggle="tab">Reviews (1)</a></li> --}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-description">
                            <div class="cpt_product_description ">
                                <div>
                                <p> {{ $product->product_description }}</p>
                                </div>
                            </div>
                            <!-- cpt_container_end --></div>
                        {{-- <div class="tab-pane" id="tab-review">
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
                        </div> --}}
                    </div>
                </div>
            </div>  
            
        
        
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col">
                <h3 class="productblock-title">Related Products</h3>

                @include('frontend.pages.product.partials.related-products')
            </div>
        </div>


    @endsection
    <!--end section--> 

    @section('script')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    @endsection
    <!--end section--> 
