@extends('frontend.layouts.master')
<!--start section -->
@section('title')
<title>App</title>    
@endsection
@section('content')

<div class="container col-2">

    @include('frontend.partials.banner')
    {{-- main --}}

    <div class="row">
        {{-- siad-bar --}}
        @include('frontend.partials.sidebar')
        {{-- end siad-bar --}}

        {{-- main-section --}}

        @include('frontend.pages.product.allproduct')

    </div>
    {{-- end-main --}}
</div>    

@endsection   
<!--end section--> 

@section('script')
<script>

    
$(document).ready(function(){


$("#addtocart").click(function (e) { 

    e.preventDefault();

    alert(" product added to card");
});

    var url="{{ url('api/shop/latest/') }}";
    $.ajax({
        url: url,
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            
            // alert('ok');
            console.log(response);
            var len = response.length;
            for(var i=0; i<len; i++){
               
                var id = response[i].id;
                $('#addtocart').val(id);
                var product_title = response[i].product_title;
                var offerPrice = response[i].offerPrice;
               

                var div = `
                <div class="product-thumb transition">
                    <div class="image product-imageblock"> <a href="product.html"><img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                        <div class="button-group">
                            <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                            <button type="button" class="addtocart-btn" id="addtocart[${id}]" >Add to Bag-${id}</button>
                            <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                        </div>
                    </div>
                    <div class="caption product-detail">
                        <h4 class="product-name"><a href="#" title="iPod Classic">${product_title}</a></h4>
                        <p class="price product-price">${offerPrice}<span class="price-tax">Ex Tax: $1</span></p>
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                    </div>
                </div>
                
                `

                    // "<td align='center'>" + (i+1) + "</td>" +
                    // "<td align='center'>" + username + "</td>" +
                    // "<td align='center'>" + name + "</td>" +
                    // "<td align='center'>" + email + "</td>" +
                    // "</tr>";

                $("#products").append(div);
            }

        }
    });
});

</script>
   
@endsection