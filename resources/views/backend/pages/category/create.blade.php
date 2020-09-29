@extends('backend.layouts.app')
@section('title', 'Category Management')
@section('admin-content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8 col-sm-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Manage Category</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#catagory"><i class="ti-plus"></i></button>
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
                    <div class="card-header table-card-header">
                        <h5>Export List</h5>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th> Name</th>
                                    <th> parent_catagories</th>
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
                <div class="modal fade" id="catagory" tabindex="-1" role="dialog" aria-labelledby="catagoryCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLabel">Add Catagory</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
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
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" id="submit">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
            

                <!-- Basic Inputs Validation start -->
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="" id="title">Add Category</h3>
                        <h5>Basic Inputs Validation</h5>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>

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
                </div> --}}
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
                    { data: 'parent_catagories', name: 'parent_catagories' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ]
            });

            //submit function
            $('#submit').click(function(e) {
                e.preventDefault();
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
                        console.log(result);
                        if (result.error==false) {
                            successNotification();
                            removeUpdateProperty("catagory");
                            document.getElementById("myform").reset();
                        }
                        if(result.error==true){
                            getError(result.message);
                        }
                    }

                });
            });
            //edit view
            function editCategory(id)
            {
                setUpdateProperty(id, "catagory","catagory","submit");
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