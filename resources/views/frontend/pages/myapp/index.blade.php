@extends('frontend.layouts.master')
<!--start section -->
@section('title')
<title>App</title>    
@endsection
@section('content')

<div class="container col">
    <div id="app">
        @include('frontend.partials.flash-massage ') 
    </div>

    @include('frontend.partials.banner')
    {{-- main --}}

    <div class="row">
       
        
        {{-- siad-bar --}}
        @include('frontend.partials.sidebar')
        {{-- end siad-bar --}}

        {{-- main-section --}}

        @include('frontend.pages.product.index')

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">sucessfull</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Item Added Successfully to you Cart. Please confirm you Order with details Information.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="{{ route('carts') }}">view cart</a></button>
                <button type="button" class="btn btn-primary">back to Shoping</button>
                </div>
            </div>
            </div>
        </div>

    </div>
    {{-- end-main --}}
</div>    

@endsection   
<!--end section--> 
@section('script')

<script>

$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  
 
// 		$.ajax({
// 		  url: 'https://randomuser.me/api/?results=20&gender=male&nat=us',
// 		  dataType: 'json',
// 		  success: function(data) {
// 		    console.log(data.results);
// 		    $.each(data.results, function(k, v) {

//                   var random_num =  Math.floor(Math.random()*60);
                  
// 			    owl.trigger('add.owl.carousel', [jQuery('')]);
// 			});
// 			owl.trigger('refresh.owl.carousel');
			
			
		
			
			
// 		  }
// 		});
	  
// 	});
 
    
//$(document).ready(function(){


//  var dat=$('#latest-slidertab').html(`<div class="item ">
//                 <div class="product-thumb transition">
//                     <div class="image product-imageblock"> <a href="product.html"><img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
//                         <div class="button-group">
//                             <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
//                             <button type="button" class="addtocart-btn" >Add to fuck 2</button>
//                             <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
//                         </div>
//                     </div>
//                     <div class="caption product-detail">
//                         <h4 class="product-name"><a href="#" title="iPod Classic"> Classic</a></h4>
//                         <p class="price product-price">$122.00<span class="price-tax">Ex Tax: $100.00</span></p>
//                         <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
//                     </div>
//                     <div class="button-group">
//                         <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
//                         <button type="button" class="addtocart-btn" >Add to Card</button>
//                         <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
//                     </div>
//                 </div>
//             </div>`);


    // var url="{{ url('api/shop/latest/') }}";
    // console.log($this.attr('data-id'));
    // $('div').data('appnedProduct').append(`<div class="item ">
    //             <div class="product-thumb transition">
    //                 <div class="image product-imageblock"> <a href="product.html"><img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
    //                     <div class="button-group">
    //                         <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
    //                         <button type="button" class="addtocart-btn" >Add to fuck 2</button>
    //                         <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
    //                     </div>
    //                 </div>
    //                 <div class="caption product-detail">
    //                     <h4 class="product-name"><a href="#" title="iPod Classic">iPod Classic</a></h4>
    //                     <p class="price product-price">$122.00<span class="price-tax">Ex Tax: $100.00</span></p>
    //                     <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
    //                 </div>
    //                 <div class="button-group">
    //                     <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
    //                     <button type="button" class="addtocart-btn" >Add to Card</button>
    //                     <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
    //                 </div>
    //             </div>
    //         </div>`);

    // 		var html = '';   
// 		var owl = $('.owl-carousel').owlCarousel({
// 		    loop:true,
// 		    // smartSpeed: 100,
// 		    // autoplay: true,
// 		    // autoplaySpeed: 100,
// 		    // mouseDrag: false,
// 		    // margin:10,
// 		    // animateIn: 'slideInUp',
// 		    // animateOut: 'fadeOut',
// 		    // nav:false,
// 		    responsive:{
// 		        0:{
// 		            items:1
// 		        },
// 		        600:{
// 		            items:1
// 		        },
// 		        1000:{
// 		            items:1
// 		        }
// 		    }

//:Comment add to card test
 


// var addtocart = $("#addtocart").val(id);
// console.log(addtocart)


   // var owl = $('#latest-slidertab').owlCarousel({
        
		    // loop:true,
		    // smartSpeed: 100,
		    // autoplay: true,
		    // autoplaySpeed: 100,
		    // mouseDrag: false,
		    // margin:10,
		    // animateIn: 'slideInUp',
		    // animateOut: 'fadeOut',
		    // nav:false,
		    // responsive:{
		    //     0:{
		    //         items:1
		    //     },
		    //     600:{
		    //         items:1
		    //     },
		    //     1000:{
		    //         items:1
		    //     }
		    // }
    //    });
    //    console.log(owl);
    //  $.ajax({
    //     url: url,
    //      type: 'get',
    //      dataType: 'JSON',
    //      success: function(response){
            
    //         //  alert('ok');
    //          console.log(response);
    //          var len = response.length;
    //          for(var i=0; i<len; i++){
               
    //              var id = response[i].id;
    //              $('#addtocart').val(id);
    //              var product_title = response[i].product_title;
    //              var offerPrice = response[i].offerPrice;
               

    //         //      var div = 
                 
    //         //      `
    //         //      <div class="item">

    //         //      <div class="product-thumb transition">
    //         //          <div class="image product-imageblock"> <a href="product.html"><img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
    //         //              <div class="button-group">
    //         //                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
    //         //                  <button type="button" class="addtocart-btn" id="addtocart" >Add to Bag-${id}</button>
    //         //                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
    //         //              </div>
    //         //          </div>
    //         //          <div class="caption product-detail">
    //         //              <h4 class="product-name"><a href="#" title="iPod Classic">${product_title}</a></h4>
    //         //              <p class="price product-price">${offerPrice}<span class="price-tax">Ex Tax: $1</span></p>
    //         //              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
    //         //          </div>
    //         //      </div>
    //         //      </div>
    //         //    `

    // //                 // "<td align='center'>" + (i+1) + "</td>" +
    // //                 // "<td align='center'>" + username + "</td>" +
    // //                 // "<td align='center'>" + name + "</td>" +
    // //                 // "<td align='center'>" + email + "</td>" +
    // //                 // "</tr>";
    //               //var data= $("#latest-slidertab").append(data);


    //                owl.trigger('add.owl.carousel',[jQuery(

                     
    //              `
    //              <div class="item">

    //              <div class="product-thumb transition">
    //                  <div class="image product-imageblock"> <a href="product.html"><img src="{{ asset('frontend/image/product/product.jpg') }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
    //                      <div class="button-group">
    //                          <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
    //                          <button type="button" class="addtocart-btn" id="addtocart" >Add to Bag-${id}</button>
    //                          <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
    //                      </div>
    //                  </div>
    //                  <div class="caption product-detail">
    //                      <h4 class="product-name"><a href="#" title="iPod Classic">${product_title}</a></h4>
    //                      <p class="price product-price">${offerPrice}<span class="price-tax">Ex Tax: $1</span></p>
    //                      <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
    //                  </div>
    //              </div>
    //              </div>
    //            `

    //                )]);
               
    //          } owl.trigger('refresh.owl.carousel');

    //      }
    //      });

//     $("#addtocart").click(function (e) { 

// e.preventDefault();

// alert(" product added to card");
// });
// });

</script>
   
@endsection
{{-- 
$.each (response, function (key, value) {
    tr +=
        "<tr>"+
            "<td>"+
            '<label class="radio"><input class="roll['+value.roll+']" type="radio" name="attend['+value.id+']" value="present">Present</label><label class="radio"><input class="roll['+value.roll+']" type="radio"  name="attend['+value.id+']" value="absent">Absent</label><label class="radio"><input class="roll['+value.roll+']" type="radio" name="attend['+value.id+']" value="late">late</label>'
            +"</td>"+
            "<td>"+value.roll+"</td>"+
            "<td>"+value.firstName+"</td>"+
            
      "</tr>";
  
   });
    $('tbody').html(tr); --}}