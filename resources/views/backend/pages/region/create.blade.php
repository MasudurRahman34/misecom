@extends('backend.layouts.app')
@section('title', 'region Management')
@section('admin-content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8 col-sm-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Manage region</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#region"><i class="ti-plus"></i></button>
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
                                    <th> shipping Cost</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="modal fade" id="region" tabindex="-1" role="dialog" aria-labelledby="regionCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header bg-info">
                          <h5 class="modal-title" id="modalLabel">Add region</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="myform" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-body">
                           
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Region name</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="region_name" id="region_name"  required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Shipping cost</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="shipping_cost" id="shipping_cost"  required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Section</label>
                                    <div class="col-sm-5">
                                        <span class="messages"></span>
                                        <select class="form-control "  id="section_id" name="section_id">
                                            @foreach ($sections as $section)
                                            <option value="{{ $section->id }}" selected>{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Description</label>
                                    <div class="col-sm-5">
                                        <textarea name="description" id="description" cols="10" rows="5" class="form-control"></textarea>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Status</label>
                                    <div class="col-sm-5">
                                        <span class="messages"></span>
                                        <select class="form-control "  id="status" name="status">
                                                ,<option value="1" selected>Active</option>
                                                ,<option value="0" >Inactive</option>
                                        </select>
                                    </div>
                                </div> --}}
                               
                                
                                {{-- <div class="form-group row">
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
                                    </div> --}}
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
                    'copy', 'excel',
                   
                    'colvis',
                ],
                columnDefs: [ {
                    // targets: -1,
                    visible: false
                } ],
                processing:true,
                serverSide:true,
                ajax:"{{url('/api/admin/region/synctable')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'region_name', name: 'region_name' },
                    { data: 'shipping_cost', name: 'shipping_cost' },
                    
                    
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
                   var url="{{url('/api/admin/region/update')}}"+"/"+id;
               }else{
               var url="{{url('/api/admin/region/store')}}"
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
                           removeUpdateProperty("region");
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
                setUpdateProperty(id, "region","region","submit");
                var url="{{url('/api/admin/region/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(result) {
                        $('#region_name').val(result.data.region_name);
                        $('#shipping_cost').val(result.data.shipping_cost);
                        //$('#thumbnail_image').val(result.data.thumbnail_image);
                        // $('#modal-preview').attr('src', SITEURL +'/img/product/region/thumbnail/'+result.data.thumbnail_image);
                        // $('#hidden_image').attr('src', SITEURL +'/img/product/region/thumbnail/'+result.data.thumbnail_image);
                        
                        }
                     });
             }
            //delete
            function btnDelete (id) {
                var url = "{{url('/api/admin/region/destroy')}}";
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