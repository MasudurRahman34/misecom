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
                        <span>manage products</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Admin</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">products</a>
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
            <div class="col-md-7 col-sm-7">
                {{-- @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif --}}

                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                      @endif
                    @endforeach
                  </div>

                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>Export products As you Need</h5>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>desctoption</th>
                                    <th>Price</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-sm-5">

                <!-- Basic Inputs Validation start -->
                <div class="card">
                    <div class="card-header table-card-header">
                        <h5 class="" id="title" >Add Product</h5>
                        {{-- <h5>Basic Inputs Validation</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}

                    </div>
                    <div class="card-block">
                        <form id="myform" method="post" action="javascript:void(0)" novalidate="">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Product Title</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Text Input Validation" required>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Price</label>
                                <div class="col-sm-5">
                                    <input type="number" min="1" max="30000" class="form-control" name="Price" id="Price" required>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Product Description</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" cols="5" class="form-control" name="product_description" id="product_description"  placeholder="Default"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label"> Category</label>
                                <div class="col-sm-5">
                                    <span class="messages"></span>
                                    <select class="form-control "  id="category_id" name="category_id">
                                      
                                        @if($categories)
                                            @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id}}" class="col-sm-4">{{$categorie->name}}</option>
                                            @endforeach
                                        @else
                                            <option value="">no data found</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label"> Brnd</label>
                                <div class="col-sm-5">
                                    <span class="messages"></span>
                                    <select class="form-control "  id="brand" name="brand">
                                       
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=""></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary m-b-0" id="submit" >Submit</button>
                                </div>
                            </div>
                        </form>
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
       
        function required()
            {
                var product_title = $('#product_title').val();
                var product_description = $('#product_description').val();
                if (product_title === "" && product_description === "" )
                {
                alert("Please input Value in empty field");
                return false;
                }
                else 
                {
                return true; 
                }
            }

            function setUpdateProperty(id,  propertyName){
                    $("#submit").html("Update "+propertyName+"");
                    $("#title").html("Update "+propertyName+"");
                    $("#submit").val(id);
                }    

        var table= $('#sampleTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf',
                    {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                            }
                    },
                    'colvis',
                ],
                columnDefs: [ {
                    // targets: -1,
                    visible: false
                } ],
                processing:true,
                serverSide:true,
                ajax:"{{url('admin/products/show')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'product_title', name: 'product_title' },
                    { data: 'product_description', name: 'product_description' },
                    { data: 'Price', name: 'Price' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ]
            });

            //submit function
            $('#submit').click(function(e) {
                e.preventDefault();
                required();
                var id=$('#submit').val();
                if(id>0){
                    console.log(`submit id:`+id);
                }
                
                

                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                if (id>0) {
                    var url="{{url('admin/products/update')}}"+"/"+id;
                }else{
                var url="{{url('admin/products/store')}}"
                }
                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        product_title: $('#product_title').val(),
                        product_description: $('#product_description').val(),
                        Price: $('#Price').val(),
                        category_id: $('#category_id option:selected').val(),
                        brand: $('#brand option:selected').val(),
                       
                    },
                    success: function (result) {
                        if (result.success) {
                            console.log(result);
                            alert('data added to server.');
                            document.getElementById("myform").reset();
                            setTimeout( function() 
                                        {table.draw()},600);
                        }
                        if(result.errors){

                            function getError(errorMessage){
                                    for (err in errorMessage) {
                                    $('<div>'+errorMessage[err]+'</div>').insertAfter('#'+err).addClass('text-danger').attr('id','error');
                                    console.log(err);
                                }
                                getError(result.errors);    
                                Session:errors('ERRRORS');
                            }
                        }
                    }

                });
            });
            //edit view
            function editProduct(id)
            {
                setUpdateProperty(id, "Brand");
                var url="{{url('/admin/products/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(data) {
                        $('#product_title').val(data.product_title);
                        $('#product_description').val(data.product_description);
                        $('#Price').val(data.Price);
                        console.log(data);
                        }
                     });
             }
            //delete
            function deleteProduct(id) {
                var url = "{{url('/admin/products/delete')}}";
                $.ajax({
                   url:url+"/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                       console.log(data)
                       alert('data success fully deleted');
                       table.draw();
                   }
               })
            }   
    </script>

    @endsection