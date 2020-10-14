<script src="{{ asset('frontend/javascript/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/javascript/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('frontend/javascript/template_js/jstree.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/javascript/template_js/template.js') }}"></script>
<script src="{{ asset('frontend/javascript/common.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/javascript/global.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/javascript/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>





<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
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
                        alert(`Item added to your wishlist !!`);
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
        function addtocart(){
            $('.addtocart-btn').on("click",function (e) { 
                var id = $(this).attr('id');
                console.log(id);
                //e.preventDefault();
                //alert(" product " +id+ " is added to card");
                var url = "{{ url('/') }}";
                $.ajax({
                    type: "Post",
                    url: url+"/api/carts/store",
                    data: {
                        product_id:id,
                    },
                    
                    success: function (data) {
            
                        //let $rout = '{{ route('carts') }}';
                        alert(`Item added to cart successfully !!`);
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart-total").html(data.totalItems);
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
        function showProduct_addtocart(){
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
                    },
                    
                    success: function (data) {
            
                        //let $rout = '{{ route('carts') }}';
                        alert(`Item added to cart successfully !!`);
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart-total").html(data.totalItems);
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
                        alert(`Cart update successfully !!`);
                        // location.reload();
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#wishlist-total").load(" #wishlist-total > *");
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
                        alert(`wishlist update successfully !!`);
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
                        alert(`Cart update successfully !!`);
                        location.reload();
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart_tale_id").load(" #cart_tale_id > *");
                        $("#cart-total").html(data.totalItems);
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
        function update(){
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
                        alert(`Cart update successfully !!`);
                        location.reload();
                        $("#changeid").load(" #changeid > *");
                        $("#update_table_id").load(" #update_table_id > *");
                        $("#cart_tale_id").load(" .product_quantity > *");
                        cart_tale_id
                        //$("#content").load(" #content > *");
                        $("#cart-total").html(data.totalItems);
                        
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
        function checkout(){
            //set submit-button
            $('#button-confirm').click(function (e) { 
                e.preventDefault();
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
                    },
                
                    success: function (response) {
                    console.log(response);
                    if(response){
                        alert('your order is complate. Thank You');
                        location.reload();
                        //$("#divid").load(" #divid > *");
                        $("#changeid").load(" #changeid > *");
                        //$("#update_table_id").load(" #update_table_id > *");

                        }
                    
                    }
                });
            });  
        };
        checkout(); 
        update();
        cart_delete();
        addtoWishlist();
        addtocart();
        showProduct_addtocart();
        deleteAddtocart();
        deleteWishlist();

    });
</script>
{{-- javascript-end --}}

