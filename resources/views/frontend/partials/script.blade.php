<script src="{{ asset('frontend/javascript/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/javascript/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('frontend/javascript/template_js/jstree.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/javascript/template_js/template.js') }}"></script>
<script src="{{ asset('frontend/javascript/common.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/javascript/global.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/javascript/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>





<!-- JavaScript -->
{{-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script> --}}

<!-- include the script -->
<script src="{{ asset('frontend/alertifyjs/alertify.min.js') }}"></script>
 Include CSS
<!-- include the style -->
<link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/alertify.min.css') }}" />
<!-- include a theme -->
<link rel="stylesheet" href="{{ asset('frontend/alertifyjs/css/themes/default.min.css') }}" />
{{-- <script data-cfasync="false" src="{{ asset('frontend/js/script.js') }}"></script> --}}

{{-- bootstap-js --}}


{{-- javascript-start --}}
<script type="text/javascript">
    $(document).ready(function () {
        //alert('ok');
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });

        function ajax_header_cart(){
            $.ajax({
                type: "get",
                url: "{{url('api/carts/ajax_header_cart')}}",
                success: function (response) {
                    $('#ajax_header_cart').html(response);
                    deleteAddtocart();
                    
                }
            });
        }
        
        ajax_header_cart();

        //cart-page
        function ajax_cart_table(){
            $.ajax({
                type: "get",
                url: "{{url('api/carts/ajax_cart_table')}}",
                success: function (response) {
                    $('#ajax_cart_table').html(response);
                    cart_update();
                    cart_delete();
                
                }
            });
        }
        ajax_cart_table();

        function ajax_checkout_table(){
            $.ajax({
                type: "get",
                url: "{{url('api/checkout/ajax_checkout_page')}}",
                success: function (response) {
                    $('#ajax_checkout_product_cost').html(response);
                    ajax_header_cart();
                    checkout(); 

                 
                
                }
            });
        }
        ajax_checkout_table();
      

        //wish-list-
        function addtoWishlist(){
            $('.wishlist-btn').on("click",function (e) { 
            var id = $(this).attr('id');
            console.log(id);
            //e.preventDefault();
            //alert(" product " +id+ " is added to card");
            var url = "{{ url('/') }}";
                $.ajax({
                    type: "Post",
                    url: url+"/api/wishlist/store",
                    data: {
                        product_id:id,
                    },
                    
                    success: function (data) {
                        
                        //let $rout = '{{ route('carts') }}';
                        //alert(`Item added to your wishlist !!`);
                        alertify.set('notifier','position', 'top-center');
                        alertify.success('Item added to Wishlist');
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#wishlist-total").load(" #wishlist-total > *");
                        //wishlisttotal
                        $("#cart-total").html(data.totalItems);
                        $("#cart-total").html(data.wishlisttotal);
                        //location.reload();
                        // $('#exampleModalCenter').modal('show')
                        // setTimeout(2000);
                        
                        // data = JSON.parse(data);
                        // if(data == 'success'){
                            
                        //     // toast
                        //     alertify.set('notifier','position', 'top-center');
                        //     alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
            
                        //     $("#totalItems").html(data.totalItems);
                        //  }
                    }
                });
            });
        };
        function deleteWishlist(){
            $('.btn-wishlist-delete').on("click",function (e) { 
            // alert('ok');
            let id = $(this).attr("id");
            console.log(id);
            var url = "{{ url('/') }}";
                $.ajax({
                    type: "Post",
                    url: url+"/api/wishlist/delete/"+id,
                    data: {
                        id:id,
                    },
                    
                    success: function (data) {
                        //let $rout = '{{ route('carts') }}';
                        //alert(`wishlist update successfully !!`);
                        alertify.set('notifier','position', 'top-center');
                        alertify.success('Item delete from Wishlist');
                        location.reload();
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart-total").html(data.wishlisttotal);
                        //setTimeout(worker, 2000);
                        // $('#exampleModalCenter').modal('show')
                        // data = JSON.parse(data);
                        //if(data == 'success'){
                        //     // toast
                        //     alertify.set('notifier','position', 'top-center');
                        //     alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
                        //     $("#totalItems").html(data.totalItems);
                        //}
                    }
                });
            });
        };

    //    function product_size(){
        //var size="";
            $(".product_quantity").on('change', function () {
                //alert('ok')
                var quantity =$(this).find('option:selected').attr('id');
                var size = $(this).val();
                
                console.log(size);
                console.log(quantity);
                addtocart(size);
                if(quantity<=10){
                   // $(".addtocart").css(display, none);
                   function alert_msg() {  

                    alertify.set('notifier','position', 'top-center');
                    alertify.alert('out of stock-Try other size').setHeader('This Size is out of Stock'); 
                    
                    }
                    alert_msg();
                }
               
      
            });   
        // }  

        //all-general-view        
        function addtocart(size){
            $('.addtocart-btn').on("click",function (e) {  
                var id = $(this).attr('id');
                console.log(id);
                //e.preventDefault();
                //alert(" product " +id+ " is added to card");
                var url = "{{ url('/') }}";
            
                alert(size);
                $.ajax({
                    type: "Post",
                    url: url+"/api/carts/store",
                    data: {
                        product_id:id,
                        product_size:size,
                    },
                    
                    success: function (data) {
            
                        //let $rout = '{{ route('carts') }}';
                        //alert(`added to card`);
                        alertify.set('notifier','position', 'top-center');
                        alertify.success('Item added to Cart');
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart-total").html(data.totalItems);
                        ajax_header_cart();
                        //location.reload();
                        // $('#exampleModalCenter').modal('show')
                        // setTimeout(2000);
                        
                        // data = JSON.parse(data);
                        // if(data == 'success'){
                            
                        //     // toast
                        //     alertify.set('notifier','position', 'top-center');
                        //     alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
            
                        //     $("#totalItems").html(data.totalItems);
                        //  }
                    }
                });
            });
        };
        //all-general-view
        function deleteAddtocart(){
            $('.btn-cart-delete').on("click",function (e) { 
            // alert('ok');
            let cart_id = $(this).attr("id");
            console.log(cart_id);
            var url = "{{ url('/') }}";
                $.ajax({
                    type: "Post",
                    url: url+"/api/carts/delete/"+cart_id,
                    data: {
                        cart_id:cart_id,
                    },
                    
                    success: function (data) {
                        //let $rout = '{{ route('carts') }}';
                        //alert(`Cart Items Removed !!`);
                        alertify.set('notifier','position', 'top-center');
                        alertify.success('Item removed from cart');
                        // location.reload();
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#wishlist-total").load(" #wishlist-total > *");
                        $("#cart-total").html(data.wishlisttotal);
                        ajax_header_cart();
                    }
                });
            });

        };


 
        //show-product
        function singleProductDetails_addtocart(){
            $('.show-product-addtocart-btn').on("click",function (e) { 
                var id = $(this).attr('id');


                console.log(id, product_quantity);
                //e.preventDefault();
                //alert(" product " +id+ " is added to card");

                var url = "{{ url('/') }}";
                var product_quantity = $('#input-quantity').val();
                console.log(product_quantity);
                $.ajax({
                    type: "Post",
                    url: url+"/api/carts/Pstore",
                    data: {
                        product_id:id,
                        product_quantity:product_quantity,
                        product_size: $('#product_size option:selected').val(),
                    },
                    
                    success: function (data) {
            
                        //let $rout = '{{ route('carts') }}';
                        //alert(`Item added to cart successfully !!`);
                        alertify.set('notifier','position', 'top-center');
                        alertify.success('Item add to Cart');
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart-total").html(data.totalItems);
                        ajax_header_cart();
                        //location.reload();
                        // $('#exampleModalCenter').modal('show')
                        // setTimeout(2000);
                        
                        // data = JSON.parse(data);
                        // if(data == 'success'){
                            
                        //     // toast
                        //     alertify.set('notifier','position', 'top-center');
                        //     alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
            
                        //     $("#totalItems").html(data.totalItems);
                        //  }
                    }
                });
            });
        };
        //cart-page-
        function cart_delete() {
            $('.btn-cart-delete').on("click", function (e) { 
            // alert('ok');
            let cart_id = $(this).attr("id");
            console.log(cart_id);
            var url = "{{ url('/') }}";
                $.ajax({
                    type: "Post",
                    url: url+"/api/carts/delete/"+cart_id,
                    data: {
                        cart_id:cart_id,
                    },
                    success: function (data) {
                        //let $rout = '{{ route('carts') }}';
                        //alert(`Cart update successfully !!`);
                        alertify.set('notifier','position', 'top-center');
                        alertify.success('Item delete from Cart');
                        location.reload();
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart_tale_id").load(" #cart_tale_id > *");
                        $("#cart-total").html(data.totalItems);
                        ajax_header_cart();
                        ajax_cart_table();
                        //setTimeout(worker, 2000);
                        // $('#exampleModalCenter').modal('show')
                        // data = JSON.parse(data);
                        //if(data == 'success'){
                        //     // toast
                        //     alertify.set('notifier','position', 'top-center');
                        //     alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
                        //     $("#totalItems").html(data.totalItems);
                        //}
                    }
                });
                if(cart_id<=0){
                    $( "#calculation" ).hide();
                };
            });
        };
        //cart-page-
        function cart_update(){
            $('.btn-cart-submit').on("click",function (e) { 
            // alert('ok');
            let cart_id = $(this).attr("id");
            console.log(cart_id);
            $("#product_quantity").val(cart_id);
            let product_quantity= $("#product_quantity_"+cart_id).val();
            console.log(product_quantity);
            var url = "{{ url('/') }}";
                $.ajax({
                    type: "Post",
                    url: url+"/api/carts/update/"+cart_id,
                    data: {
                        cart_id:cart_id,
                        product_quantity:product_quantity,
                    },
                    success: function (data) {
                        //let $rout = '{{ route('carts') }}';
                        //alert(`Carts Update Successfully !!`);
                        alertify.set('notifier','position', 'top-center');
                        alertify.success('Item Cart Updated');
                        //location.reload();
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart_tale_id").load(" .product_quantity > *");
                        //cart_tale_id
                        //$("#content").load(" #content > *");

                        $("#cart-total").html(data.totalItems);
                        ajax_header_cart();
                        ajax_cart_table();
                        
                        // $('#exampleModalCenter').modal('show')
                        // data = JSON.parse(data);
                        //if(data == 'success'){
                        //     // toast
                        //     alertify.set('notifier','position', 'top-center');
                        //     alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
                        //     $("#totalItems").html(data.totalItems);
                        //}
                    }
                });
            });
        };

        function checkoutcalculation(){
            $("#Delivery_Details_zone_id").on('change', function () {
                //ajax_checkout_table();
                var price = $("#Delivery_Details_zone_id").find(':selected').data('id');
                //price =$("#shipping_cost").val(price);
                $("#shipping_cost").text(price);
                alert('your shipping price is '+price+' taka');

                 var sub_total = $("#sub_total").text();
                 var int_price =parseInt(price);
                 var int_total= parseInt(sub_total);

                //  var sub_total = $("#hidden_sub_total").val();
                var total= (int_price+int_total);
                $('.total_amount').attr('id', total);
                $('#total').text(total);
                //alert(total);    
                 
            });
        }
        checkoutcalculation();

        //checkout-page
        function checkout(){
            //set submit-button
            $('#button-confirm').click(function (e) { 
                e.preventDefault();
                let Billing_Details_name =$('#Billing_Details_name').val();
                let Billing_Details_address =$('#Billing_Details_address').val();
                let Billing_Details_contact_number =$('#Billing_Details_contact_number').val();
                let Billing_Details_city=$('#Billing_Details_city').val();
                let Billing_Details_zone_id =$('#Billing_Details_zone_id').val();
                
                //delivery-details or shipping details
                let Delivery_Details_name =$('#Delivery_Details_name').val();
                let Delivery_Details_address_1= $("#Delivery_Details_address_1").val();
                let Delivery_Details_address_2= $("#Delivery_Details_address_2").val();
                let Delivery_Details_phone_number = $("#Delivery_Details_phone_number").val();
                let Delivery_Details_emailAddress = $("#Delivery_Details_emailAddress").val();
                let Delivery_Details_city = $("#Delivery_Details_city").val();
                let Delivery_Details_postcode = $("#Delivery_Details_postcode").val();
                let Delivery_Details_zone_id = $("#Delivery_Details_zone_id").val();
                let payment_method = $("#payment_method:checked").val();



                let total_amount = $('.total_amount').attr('id'); 
                console.log(total_amount);
                //set Url
                let url = "{{ url('/') }}";

                    //set ajax for post request

                $.ajax({
                    type: "post",
                    url: url+"/checkout/store/",
                    data:{
                        total_amount:total_amount,
                        //billing-data
                        Billing_Details_name:Billing_Details_name,
                        Billing_Details_address:Billing_Details_address,
                        Billing_Details_contact_number:Billing_Details_contact_number,
                        Billing_Details_city:Billing_Details_city,
                        Billing_Details_region:Billing_Details_zone_id,
                        //delivery-data
                        delivery_clint_name:Delivery_Details_name,
                        delivery_clint_phone_number:Delivery_Details_phone_number,
                        delivery_clint_emailAddress:Delivery_Details_emailAddress,
                        delivery_shipping_address_1:Delivery_Details_address_1,
                        delivery_shipping_address_2:Delivery_Details_address_2,
                        delivery_city:Delivery_Details_city,
                        delivery_post_code:Delivery_Details_postcode,
                        delivery_region:Delivery_Details_zone_id,
                        payment_option:payment_method,

                    },
                
                    success: function (response) {
                    console.log(response);
                    if(response){
                        //alert('your order is complate. Thank You');
                        alertify.set('notifier','position', 'top-center');
                        alertify.success('Order Complate Sucessfully. You item will be shipped in 24 hour. Thank You ');
                         var url = "<?php echo URL::to('shop/invoice'); ?>";
                         //window.open(url, '_blank');
                         setTimeout(function () {
                            window.location.replace(url); //will redirect to your blog page (an ex: blog.html)
                            }, 500);

                         //window.location.replace(url);
                         //window.open(url);
                        //$("#divid").load(" #divid > *");
                        $("#changeid").load(" #changeid > *");
                        //$("#update_table_id").load(" #update_table_id > *");

                        }
                    
                    }
                });
            });  
        };
        checkout(); 
        cart_update();
        cart_delete();
        addtoWishlist();
        // addtocart();
        singleProductDetails_addtocart();
        deleteAddtocart();
        deleteWishlist();

    });
</script>
{{-- javascript-end --}}

