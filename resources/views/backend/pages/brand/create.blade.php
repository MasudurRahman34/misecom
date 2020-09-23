@extends('backend.layouts.app')
@section('title', 'Brands Management')
@section('admin-content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4> Brands</h4>
                        <span>manage Brands</span>
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
                        <li class="breadcrumb-item"><a href="#!">Brands</a>
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

                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>Export Brands As you Need</h5>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th> Name</th>
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
                    <div class="card-header">
                        <h5 class="" id="title">Add Brand</h5>
                        {{-- <h5>Basic Inputs Validation</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}

                    </div>
                    <div class="card-block">
                        <form id="myform" method="post" action="javascript:void(0)" novalidate="">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Brand Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Text Input Validation" required>
                                    <span class="messages"></span>
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
                var brand_name = $('#brand_name').val();
                if (brand_name === "")
                {
                alert("Please input a Value");
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
                ajax:"{{url('admin/brands/show')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'brand_name', name: 'brand_name' },
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
                    var url="{{url('admin/brands/update')}}"+"/"+id;
                }else{
                var url="{{url('admin/brands/store')}}"
                }
                $.ajax({

                    type: "post",
                    url: url,
                    data: {
                        brand_name: $('#brand_name').val(),
                       
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
                            }
                        }
                    }

                });
            });
            //edit view
            function editBrand (id)
            {
                setUpdateProperty(id, "Brand");
                var url="{{url('/admin/brands/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(data) {
                        $('#brand_name').val(data.brand_name);
                        console.log(data);
                        }
                     });
             }
            //delete
            function deleteBrand (id) {
                var url = "{{url('/admin/brands/delete')}}";
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