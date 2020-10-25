@extends('backend.layouts.app')
@section('title', 'products Management')
@section('admin-content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4> products</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 float-right">
                <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#product"><i class="ti-plus"></i></button>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!-- Page-body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-md-12">
                <div class="dt-responsive table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Sku</th>
                        <th>Catagory</th>
                        <th>Title</th>
                        <th>desctoption</th>
                        <th>Buying price</th>
                        <th>Selling Price</th>
                        <th>Offer</th>
                        <th>Sleeve</th>
                        <th>Color</th>
                        <th>Fabric</th>
                        <th>Supplier</th>
                        {{-- <th>Created Date</th> --}}
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="modal fade bd-example-modal-lg" id="product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="javascipt::void(0)" id="myform" enctype="multipart/form-data">
                          {{-- <form action="{{route('products.store')}}" id="product_form" method="post" enctype="multipart/form-data"> --}}
                            {{-- @csrf --}}
                            <div class="modal-body">
                                <div class="row">
                                    {{-- <div class="col-sm-12">
                                        <h6>Official Information</h6>
                                        <hr>
                                    </div> --}}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Product Title</label>
                                            <input type="text" class="form-control" id="product_title" name="product_title" value="">
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="message-text" class="form-control-label">Buying Price</label>
                                            <input type="number" class="form-control" id="buy_price" name="buy_price" value="" step="any">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="message-text" class="form-control-label">Selling Price</label>
                                            <input type="number" class="form-control" id="sell_price" name="sell_price" value="" step="any">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="message-text" class="form-control-label">Offer</label>
                                        <select class="form-control m-b-1" id="offer" name="offer" required>
                                            <option value="100">100</option>
                                            <option value="80">80</option>
                                            <option value="60">60</option>
                                            <option value="50">50</option>
                                            <option value="40">40</option>
                                            <option value="20">20</option>
                                            <option value="0" selected>0</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Description</label>
                                            <textarea cols="5" rows="5" class="form-control" id="product_description" name="product_description" value=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Section</label>
                                            <select class="form-control m-b-1" id="section_id" name="section_id" required>
                                                <option>--Please Select--</option>
                                                @foreach ($sections as $section)
                                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Catagory</label>
                                            <select class="form-control m-b-1" id="catagory_id" name="catagory_id" required>
                                                <option>--Please Select--</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Brand</label>
                                            <select class="form-control m-b-1" id="brand_id" name="brand_id" required>
                                                <option>--Please Select--</option>
                                                {{-- @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach --}}
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Color</label>
                                            <select class="form-control m-b-1" id="color" name="color" required>
                                                <option value="Black">Black</option>
                                                <option value="White">White</option>
                                                <option value="Red">Red</option>
                                                <option value="Maroon">Maroon</option>
                                                <option value="Purple">Purple</option>
                                                <option value="Mix">Mix</option>
                                                {{-- @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach --}}
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Fabric</label>
                                            <select class="form-control m-b-1" id="fabric_id" name="fabric_id" required>
                                                @foreach ($fabrics as $fabric)
                                                    <option value="{{$fabric->id}}">{{$fabric->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Sleeve</label>
                                            <select class="form-control m-b-1" id="sleeve" name="sleeve" required>
                                                <option value="Half">Half</option>
                                                <option value="Full">Full</option>
                                                <option value="3 Quarter">3 Quarter</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Supplier</label>
                                            <select class="form-control m-b-1" id="supplier_id" name="supplier_id" required>
                                                <option>--Please Select--</option>
                                                @foreach ($suppliers as $supllier)
                                                    <option value="{{$supllier->id}}">{{$supllier->official_name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Status</label>
                                            <select class="form-control m-b-1" id="status" name="status" required>
                                                <option value="0">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Image Upload</h5>
                                            </div>
                                            <div class="card-block">
                                                <input type="file" name="images[]" id="images" class="filer_input1" multiple="multiple">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submit">Save</button>
                            </div>
                          </form>
                                    
                                </div>
                            </div>
                
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="modal fade bd-example-modal-lg" id="image" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Product image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                                <div class="modal-body">
                                    <div class="row">
                                        {{-- @php $i = 1; @endphp
                                        @foreach ($product->product_images as $image)
                                            @if ($i > 0)
                                                <div class="image product-imageblock"> <a href="{{ route('product.show',[$product->slug] ) }}"><img src="{{ asset('img/product/'.$image->link ) }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                                            @endif
            
                                            @php $i--; @endphp
                                        @endforeach --}}
                                                </div>
                                    
                                    
                                   
                                    
                                    
                                    
                                   
                                    
                                   
                                    
                                   
                                   
                                    
                                   
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
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
    {{-- <script src="'public\backend\files\assets\pages\jquery.filer\js\jquery.filer.min.js'"></script>
    <script src="..\files\assets\pages\filer\custom-filer.js" type="text/javascript"></script> --}}
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
                ajax:"{{url('/api/admin/product/synctable')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'sku', name: 'sku' },
                    { data: 'categories.name', name: 'categories.name' },
                    { data: 'product_title', name: 'product_title' },
                    { data: 'product_description', name: 'product_description' },
                  
                    { data: 'buy_price', name: 'buy_price' },
                    { data: 'sell_price', name: 'sell_price' },
                    { data: 'offer_price', name: 'offer_price' },
                    { data: 'sleeve', name: 'sleeve' },
                    { data: 'color', name: 'color' },
                    { data: 'fabrics.name', name: 'fabrics.name' },
                    { data: 'suppliers.official_name', official_name: 'suppliers.name' },
                    { data: 'action', name: 'action' }
                ]
            });

            //submit function
            $('#myform').submit(function(e) {
                e.preventDefault();
               
                var id=$('#submit').val();
                var catagory_id=$('#catagory_id').val();
                var brand_id=$('#brand_id').val();
                if(catagory_id=="--Please Select--"){
                        alert('Please Select catagory');
                        return true;
                }
                if(brand_id=="--Please Select--"){
                    alert('please select brand');
                    return true;
                }
                var from_data= new FormData(this)

                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                if (id>0) {
                    var url="{{url('/api/admin/product/update')}}"+"/"+id;
                }else{
                var url="{{url('/api/admin/product/store')}}"
                }
                $.ajax({
                    type: "post",
                    url: url,
                    data: from_data,
                    cache:false,
                    contentType: false,
                    processData: false,
                        
                    success: function (result) {
                        console.log(result);
                        if (result.error==false) {
                            successNotification();
                           removeUpdateProperty("product");
                            //document.getElementById("product_form").reset();
                            //$('.jFiler-items').empty();
                        }
                        if(result.error==true){
                            getError(result.message);
                        }
                    }

                });
            });
            //edit view
            function btnEdit(id)
            {
                setUpdateProperty(id, "product","product","submit");
                var url="{{url('/api/admin/product/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(data) {
                        $('#product_title').val(data.product_title);
                        $('#product_description').val(data.product_description);
                        $('#sell_price').val(data.sell_price);
                        $('#buy_price').val(data.buy_price);
                        $('#offer').val(data.offer);
                        $('#description').val(data.description);
                        //$('#section_id').val(data.section_id);
                        $('#catagory_id').val(data.catagory_id);
                        $('#brand_id').val(data.brand_id);
                        $('#supplier_id').val(data.supplier_id);
                        $('#fabric_id').val(data.fabric_id);
                        $('#color').val(data.color);
                        $('#sleeve').val(data.sleeve);
                        $('#status').val(data.status);
                        console.log(data);
                        }
                     });
             }
            //delete
            function btnDelete(id) {
                var url = "{{url('/api/admin/product/delete')}}";
                $.ajax({
                   url:url+"/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                       console.log(data)
                       if(data.error){
                        alert('product Image Found ! Please Delete Product Image First');
                       }else{
                           alert('product deleted');
                           table.draw();
                       }
                       //
                      
                   }
               })
            } 
            
            function setCatagoryBrand(res){
                var option="<option>--Please Select--</option>";
                if(res.data.catagories!=""){
                            
                            res.data.catagories.forEach(element => {
                            option+=("<option value='"+element.id+"'>"+element.name+"</option>");
                        });
                        
                        }
                        $('#catagory_id').html(option);
                       var br_option="<option>--Please Select--</option>";
                        if(res.data.brands!=""){
                            
                            res.data.brands.forEach(element => {
                            br_option+=("<option value='"+element.id+"'>"+element.name+"</option>");
                        });              
                       
                       
                        }
                        $('#brand_id').html(br_option);
            } 

            $('#section_id').change(function(e){
                var section_id=$('#section_id option:selected').val();
                var url="{{url('/api/admin/section/getCatagoryBrand')}}";
                $.ajax({
                    type:"GET",
                    url:url+"/"+section_id,
                    success:function(res){
                       // console.log(res.data);
                       setCatagoryBrand(res);
                        
                    }
                })
                //console.log(section_id);

            });
            
    </script>

    @endsection