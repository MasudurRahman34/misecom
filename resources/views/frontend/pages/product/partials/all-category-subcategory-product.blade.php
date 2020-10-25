  @extends('frontend.layouts.shop')
    <!--start section -->
  @section('title')
    <title>E-Shop||About-us</title>    
  @endsection
  @section('content')
  @section('breadcrumb')
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="category.html">Shop</a></li>
        <li>Category Product</li>
      </ul>

  @endsection
  @section('shop-content')
      @include('frontend.partials.sidebar')
      <div class="row justify-content-start" id="divid">
        <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col" id="content">
            <div class="row category-banner">
              <div class="col-sm-12 category-image"><img src="{{ asset('frontend/image/banners/category-banner.jpg') }}" alt="Desktops" title="Desktops" class="img-thumbnail" /></div>
              {{-- <div class="col-sm-12 category-desc">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</div> --}}
            </div>
            <div class="category-page-wrapper">
              <div class="col-md-6 list-grid-wrapper">
                <div class="btn-group btn-list-grid">
                  <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
              </div>
              {{-- <a href="#" id="compare-total">Product Compare (0)</a> 
              <div class="col-md-1 text-right page-wrapper">
                <label class="control-label" for="input-limit">Show:</label>
                <div class="limit">
                  <select id="input-limit" class="form-control">
                    <option value="8" selected="selected">8</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 text-right sort-wrapper">
                <label class="control-label" for="input-sort">Sort By:</label>
                <div class="sort-inner">
                  <select id="input-sort" class="form-control">
                    <option value="ASC" selected="selected">Default</option>
                    <option value="ASC">Name (A - Z)</option>
                    <option value="DESC">Name (Z - A)</option>
                    <option value="ASC">Price (Low &gt; High)</option>
                    <option value="DESC">Price (High &gt; Low)</option>
                    <option value="DESC">Rating (Highest)</option>
                    <option value="ASC">Rating (Lowest)</option>
                    <option value="ASC">Model (A - Z)</option>
                    <option value="DESC">Model (Z - A)</option>
                  </select>
                </div>
              </div> --}}

            </div>
              <br />
            <div class="grid-list-wrapper">
                @foreach ($products as $product)
                <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  @php $i = 1; @endphp
                  @foreach ($product->product_images as $image)
                      @if ($i > 0)
                          <div class="image product-imageblock"> <a href="{{ route('product.show',[$product->slug] ) }}"><img src="{{ asset('img/product/'.$image->link ) }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                      @endif
  
                      @php $i--; @endphp
                  @endforeach
                       {{-- <div class="button-group">
                      <button type="button" class="wishlist wishlist-btn" id="{{ $product->id }}" value="{{ $product->id }}" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn" id="{{ $product->id }}" value="{{ $product->id }}" >Add to Bag{{ $product->id }} </button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button> 
                    </div> --}}
                    <div class="button-group">
                      <button type="button" class="wishlist wishlist-btn" id="{{ $product->id }}" value="{{ $product->id }}" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                      {{-- <button type="button" class="addtocart-btn" id="{{ $product->id }}" value="{{ $product->id }}" >Add to Bag </button> --}}
                      <button type="button" class="addtocart-btn" id="{{ $product->id }}" value="{{ $product->id }}" > Add to Bag
                          
                          
                      </button>
                      <button type="btn btn-info" class=" compare">
                          <select name="quantity" id="product_quantity" class="product_quantity" style="background-color:orangered">
                              {{-- <option value="">..</option> --}}
                              @foreach ($product->product_variant as $option)
                              <option value="{{$option->size}}" id="{{$option->quantity}}" >{{$option->size}}</option> 
                              @endforeach
                          </select>
                      </button>
                      {{-- <input type="hidden"  id="addtocarthidden"> --}}
                      {{-- <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" > --}}
                          
                      </button>
                  </div>

                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"> <a href="product.html" title="iPod Classic">{{ $product->product_title }} </a> </h4>
                    <p class="product-desc">{{ $product->product_description }} </p>
                    <p class="price product-price"><span class="price-old">$122.00 </span> Taka: {{ $product->offer_price }}<span class="price-tax">Ex Tax: $100.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist wishlist-btn" id="{{ $product->id }}" value="{{ $product->id }}" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn" id="{{ $product->id }}" value="{{ $product->id }}"  >Add to Cart {{ $product->id }}</button>
                    {{-- <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button> --}}
                  </div>
                </div>
              </div>
                @endforeach
            

              {{-- <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/pro-2-220x294.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn">Add to Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"> <a href="product.html" title="iPod Classic"> iPod Classic </a> </h4>
                    <p class="product-desc"> More room to move.
                      
                      With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.
                      
                      Cover Flow.
                      
                      Browse through your music collection by flipping..</p>
                    <p class="price product-price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
              <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/pro-3-220x294.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn">Add to Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"> <a href="product.html" title="iPod Classic"> iPod Classic </a> </h4>
                    <p class="product-desc"> More room to move.
                      
                      With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.
                      
                      Cover Flow.
                      
                      Browse through your music collection by flipping..</p>
                    <p class="price product-price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
              <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/pro-4-220x294.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn">Add to Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"> <a href="product.html" title="iPod Classic"> iPod Classic </a> </h4>
                    <p class="product-desc"> More room to move.
                      
                      With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.
                      
                      Cover Flow.
                      
                      Browse through your music collection by flipping..</p>
                    <p class="price product-price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>

              <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product.html"> <img src="frontend/image/product/pro-5-220x294.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn">Add to Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"> <a href="product.html" title="iPod Classic"> iPod Classic </a> </h4>
                    <p class="product-desc"> More room to move.
                      
                      With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.
                      
                      Cover Flow.
                      
                      Browse through your music collection by flipping..</p>
                    <p class="price product-price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>

              </div>

              <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/pro-6-220x294.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn">Add to Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"> <a href="product.html" title="iPod Classic"> iPod Classic </a> </h4>
                    <p class="product-desc"> More room to move.
                      
                      With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.
                      
                      Cover Flow.
                      
                      Browse through your music collection by flipping..</p>
                    <p class="price product-price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
              <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/pro-7-220x294.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn">Add to Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"> <a href="product.html" title="iPod Classic"> iPod Classic </a> </h4>
                    <p class="product-desc"> More room to move.
                      
                      With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.
                      
                      Cover Flow.
                      
                      Browse through your music collection by flipping..</p>
                    <p class="price product-price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
              <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/pro-8-220x294.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn">Add to Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"> <a href="product.html" title="iPod Classic"> iPod Classic </a> </h4>
                    <p class="product-desc"> More room to move.
                      
                      With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.
                      
                      Cover Flow.
                      
                      Browse through your music collection by flipping..</p>
                    <p class="price product-price"> $122.00 <span class="price-tax">Ex Tax: $100.00</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div> 
              --}}
            </div> 
            <div class="category-page-wrapper">
              <div class="result-inner">Showing 1 to 8 of 10 (2 Pages)</div>
              <div class="pagination-inner">
                <ul class="pagination">
                  <li class="active"><span>1</span></li>
                  <li><a href="category.html">2</a></li>
                  <li><a href="category.html">&gt;</a></li>
                  <li><a href="category.html">&gt;|</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>  
   @endsection
  