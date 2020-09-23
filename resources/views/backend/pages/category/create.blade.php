@extends('backend.layouts.app')
@section('title', 'Category Management')
@section('admin-content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4> Category</h4>
                        <span>manage Category</span>
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
                        <li class="breadcrumb-item"><a href="#!">Category</a>
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
                        <h5>HTML5 Export Buttons</h5>
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
                        <h5 class="" id="title">Add Category</h5>
                        {{-- <h5>Basic Inputs Validation</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}

                    </div>
                    <div class="card-block">
                        <form id="myform" method="post" action="javascript:void(0)" novalidate="">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Category Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Text Input Validation" required>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Parent Category(optional)</label>
                                <div class="col-sm-5">
                                    <span class="messages"></span>
                                    <select class="form-control "  id="category_id" name="category_id">
                                        ,<option value="">Primary Catagory</option>
                                        @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
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
                <!-- Basic Inputs Validation end -->

                {{-- <form id="myform" action="javascript:void(0)">
                <div class="tile">
                    <h3 class="tile-title border-bottom p-2" id="title">Add Category</h3>

                    <div class="tile-body">
                    <div class="form-group row">
                    <label for="exampleSelect1" class="control-label col-md-3 pl-4">Select Class</label>
                    <select class="form-control col-md-7"  id="classId" name="classId">
                    @foreach ($class as $class)
                    <option value="{{$class->id}}">{{$class->className}}</option>
                    @endforeach
                    </select>
                    </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 pl-4"> Name</label>
                                <div class="col-md-9">
                                    <input class="form-control col-md-6" type="text" id="name" value="" name="name" required>
                                </div>
                            </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary edit_studClass"  style="float: right;" id="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form> --}}
                <!--End section-->
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
                var name = $('#name').val();
                if (name === "")
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
                ajax:"{{url('admin/categories/show')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
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
                    var url="{{url('admin/categories/update')}}"+"/"+id;
                }else{
                var url="{{url('admin/categories/store')}}"
                }
                $.ajax({

                    type: "post",
                    url: url,
                    data: {
                        name: $('#name').val(),
                        category_id: $('#category_id').val(),
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
            function editCategory(id)
            {
                setUpdateProperty(id, "Category");
                var url="{{url('/admin/categories/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(data) {
                        $('#name').val(data.name);
                        $('#category_id').val(data.name);
                        console.log(data);
                        }
                     });
             }
            //delete
            function deleteCategory(id) {
                var url = "{{url('/admin/categories/delete')}}";
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