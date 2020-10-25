@extends('backend.layouts.app')
@section('title', 'product_image Management')
@section('admin-content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8 col-sm-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Manage Product Image</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#product_image"><i class="ti-plus"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!-- Page-body start -->
    <div class="page-body">
        <div class="row">
            @include('backend.partials.massage')
            <div class="col-md-12 col-sm-12">

                <div class="card">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Sku</th>
                                    <th>product_image</th>
                                    <th>status</th>
                                    {{-- <th>Created Date</th> --}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="modal fade" id="product_image" tabindex="-1" role="dialog" aria-labelledby="product_imageCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header bg-info">
                          <h5 class="modal-title" id="modalLabel">Add product_image</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="myform" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Product</label>
                                    <div class="col-sm-5">
                                        <span class="messages"></span>
                                        <select class="form-control "  id="product_id" name="product_id">
                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-product_sku="{{$product->sku}}" selected>{{ $product->sku }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Status</label>
                                    <div class="col-sm-5">
                                        <span class="messages"></span>
                                        <select class="form-control "  id="status" name="status" required>
                                                <option value="1" selected>Active</option>
                                                <option value="0" >Inactive</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Image Upload</h5>
                                          
                                        </div>
                                        <div class="card-block">
                                            <input type="file" name="images[]" id="images" class="filer_input1" multiple="multiple">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" id="submit">submit</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="clearix"></div>
@endsection
@section('script')
    <script>
        dataDismiss();
      
        var table= $('#sampleTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel',
                   
                    'colvis',
                ],
                columnDefs: [ {
                    // targets: -1,
                    visible: false
                } ],
                processing:true,
                serverSide:true,
                ajax:"{{url('/api/admin/product/image/synctable')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'product.sku', name: 'product.sku' },
                    { data: 'product_image', name: 'product_image' },
                    { data: 'status', name: 'status' },
                    
                    { data: 'action', name: 'action' }
                ]
            });
    $(document).ready(function () {
        $('#myform').on('submit',function(e) {
               
               var id=$('#submit').val();
               if(id>0){
                   console.log(`submit id:`+id);
               }
               var formData=new FormData(this);
               $.ajaxSetup({
                   headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
               });
               if (id>0) {
                   var url="{{url('/api/admin/product/image/update')}}"+"/"+id;
               }else{
               var url="{{url('/api/admin/product/image/store')}}"
               }
               $.ajax({

                   type: "post",
                   url: url,
                
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
 
                   success: function (result) {
                       console.log(result);
                       if (result.error==false) {
                           $( "div").remove( ".text-danger" );
                           successNotification();
                           removeUpdateProperty("product_image");
                           document.getElementById("myform").reset();
                       }
                       if(result.error==true){
                           getError(result.message);
                       }
                   }

               });
           });    
});
            //submit function
            
            //edit view
            function btnEdit(id)
            {
                $('#product_image').val(5);
                setUpdateProperty(id, "product_image","product_image","submit");
                var url="{{url('/api/admin/product/image/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(result) {
                        console.log(result.data.product_image);
                        $('#product_id').val(result.data.product_id);
                        $('#status').val(result.data.status);
                        $('#size').val(result.data.size);
                        $('#product_image_input').val(result.data.product_image);
                        
                        //$('#thumbnail_image').val(result.data.thumbnail_image);
                        
                        }
                     });
             }
            //delete
            function btnDelete (id) {
                var url = "{{url('/api/admin/product/image/destroy')}}";
               var con=confirm("Danger ! You Are Going To Delete Data ");
                if(con==true){
                $.ajax({
                   url:url+"/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {               
                       table.draw();
                   }
               })
            }else{
                alert("Data is Safe");
            }
            }   
    </script>

    @endsection