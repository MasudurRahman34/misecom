
//add to cart management 
$(document).ready(function(){

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });     

    function update(){
        $('.btn-cart-submit').click(function (e) { 
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

      
      $('.btn-cart-delete').click(function (e) { 
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
        });
  

    update();

   
  });