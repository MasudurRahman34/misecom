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
                                    <th>section</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Parent_catagories</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-sm-5">
                <div class="modal fade" data-backdrop="static" data-keyboard="false" id="catagory" tabindex="-1" role="dialog" aria-labelledby="catagoryCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLabel">Add Catagory</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="myform" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-body">
                            
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
                                            <option value="">Primary Catagory</option>
                                            @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Section</label>
                                    <div class="col-sm-5">
                                        <span class="messages"></span>
                                        <select class="form-control "  id="section_id" name="section_id">
                                           
                                            @foreach ($sections as $section)
                                            <option value="{{$section->id}}">{{$section->name}}</option>
                                            @endforeach
                                            <option value="" selected>None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">status</label>
                                    <div class="col-sm-5">
                                        <span class="messages"></span>
                                        <select class="form-control "  id="status" name="status">
                                            <option value="0">Active</option>
                                            <option value="1">Inactiove</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Description</label>
                                    <div class="col-sm-5">
                                        <textarea name="description" id="description" cols="10" rows="5" class="form-control"></textarea>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Thumbnail Image(50*59 px)</label>
                                    <div class="col-sm-5">
                                        <span class="messages"></span>
                                        <input id="thumbnail_image" type="file" class="form-control" name="thumbnail_image" multiple="multiple" onchange="readURL(this);">
                                        <input type="hidden" name="hidden_image" id="hidden_image">
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">preview</label>
                                    <div id="img_preview">
                                        
                                        <style>
                                            img{
                                                padding: 5px;
                                            }
                                        </style>
                                        <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
                    
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
</div>

<div class="clearix"></div>
@endsection
@section('script')
    <script>
        dataDismiss();
        var SITEURL = '{{URL::to('')}}';
        function readURL(input, id) {
            id = id || '#modal-preview';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#modal-preview').removeClass('hidden');
            $('#start').hide();
        }}
        function delPreviewImage(e){
            console.log();
            $(e).remove();
            $('#thumbnail_image').val("");
        }
        
        var table= $('#sampleTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel','colvis',
                ],
                columnDefs: [ {
                    // targets: -1,
                    visible: false
                } ],
                processing:true,
                serverSide:true,
                ajax:"{{url('/api/admin/categories/show')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'section_id', name: 'sectoin_id' },
                    { data: 'description', name: 'description' },
                    { data: 'status', name: 'status' },
                    { data: 'thumbnail_image', name: 'thumbnail_image' },
                    { data: 'parent_catagories', name: 'parent_catagories' },
                    { data: 'action', name: 'action' }
                ]
            });

            //submit function
            $('#myform').on('submit',function(e) {
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
                    var url="{{url('/api/admin/categories/update')}}"+"/"+id;
                }else{
                var url="{{url('/api/admin/categories/store')}}"
                }
                var formData=new FormData(this);
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
                            successNotification();
                            removeUpdateProperty("catagory");
                            document.getElementById("myform").reset();
                            $('#modal-preview').attr('src','');
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
                setUpdateProperty(id, "catagory","catagory","submit");
                var url="{{url('/api/admin/categories/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(response) {
                        console.log(response);
                        $('#name').val(response.data.name);
                        $('#category_id').val(response.data.category_id);
                        $('#section_id').val(response.data.section_id);
                        $('#description').val(response.data.description);
                        $('#status').val(response.data.status);
                        $('#modal-preview').attr('src', SITEURL +'/img/product/catagory/thumbnail/'+response.data.thumbnail_image);
                        $('#hidden_image').attr('src', SITEURL +'/img/product/catagory/thumbnail/'+response.data.thumbnail_image);
                        console.log(response.data);
                        }
                     });
             }
            //delete
            function btnDelete (id) {
                var url = "{{url('/api/admin/categories/delete')}}";
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