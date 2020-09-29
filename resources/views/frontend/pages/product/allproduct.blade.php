{{-- product --}}
<div id="content" class="col-sm-9">
    <div class="customtab">
        <div id="tabs" class="customtab-wrapper">
            <ul class='customtab-inner'>
                <li class='tab'><a href="#tab-latest">Latest</a></li>
                <li class='tab'><a href="#tab-special">Special</a></li>
                <li class='tab'><a href="#tab-bestseller">Bestseller</a></li>
            </ul>
        </div>

        <!-- tab-latest-->
        @include('frontend.pages.product.partials.latest-product')
        <!-- tab-latest-end-->
        {{-- tab-special --}}
        @include('frontend.pages.product.partials.special-product')
            
         <!-- tab-special-->

        <!-- tab-bestseller-->
        @include('frontend.pages.product.partials.bestseller-product')
            
        <!-- tab-bestseller-->

       @include('frontend.partials.second-banner')


        {{-- Featured --}}
        @include('frontend.pages.product.partials.featured-product')

        @include('frontend.partials.blog')
    </div>
    @include('frontend.partials.brandimage')
</div>
{{-- end-product --}}