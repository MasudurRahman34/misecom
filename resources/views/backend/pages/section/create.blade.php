@extends('backend.layouts.app')
@section('title', 'Section Management')
@section('admin-content')
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8 col-sm-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Manage Section</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#section"><i class="ti-plus"></i></button>
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
                                    <th> Status</th>
                                    <th>Image</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="modal fade" id="section" tabindex="-1" role="dialog" aria-labelledby="sectionCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header bg-info">
                          <h5 class="modal-title" id="modalLabel">Add section</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="myform" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="modal-body">
                           
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="name" id="name"  required>
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
        var SITEURL = '{{URL::to('')}}';
        function readURL(input, id) {
            id = id || '#modal-preview';
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $(id).attr('src', e.target.result);
            
            // var image = new Image();
            // image.src = String(e.target.result);
            // image.width =100;
            // image.height =100;
            // image.class =String('form-group');
            // image.onclick=String("delete(this)");
         
            // img_preview.append(image);

            // var x = document.createElement("IMG");
            // x.setAttribute('src',e.target.result);
            // x.setAttribute('width',100);
            // x.setAttribute('height',100);
            // x.setAttribute('class','preIm');
            // x.setAttribute('onclick','delPreviewImage(this)');
            // img_preview.append(x);

            // lth=document.images.length;
            // for (let index =length; index <= length; index++) {
            //     isrc=document.images[index].src;
            //     console.log(isrc);
                
            // }
            //console.log( lth);

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
                ajax:"{{url('/api/admin/section/synctable')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'status', name: 'status' },
                    { data: 'thumbnail_image', name: 'thumbnail_image' },
                    
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
                   var url="{{url('/api/admin/section/update')}}"+"/"+id;
               }else{
               var url="{{url('/api/admin/section/store')}}"
               }
               $.ajax({

                   type: "post",
                   url: url,
                //    data: {
                //        name: $('#name').val(),
                //        status: $('#status').val(),
                //        thumbnail_image: $('#thumbnail_image').val(),
                //    },
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
 
                   success: function (result) {
                       console.log(result);
                       if (result.error==false) {
                           $( "div").remove( ".text-danger" );
                           successNotification();
                           removeUpdateProperty("section");
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
                setUpdateProperty(id, "section","section","submit");
                var url="{{url('/api/admin/section/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(result) {
                        $('#name').val(result.data.name);
                        $('#status').val(result.data.status);
                        //$('#thumbnail_image').val(result.data.thumbnail_image);
                        $('#modal-preview').attr('src', SITEURL +'/img/product/section/thumbnail/'+result.data.thumbnail_image);
                        $('#hidden_image').attr('src', SITEURL +'/img/product/section/thumbnail/'+result.data.thumbnail_image);
                        
                        }
                     });
             }
            //delete
            function btnDelete (id) {
                var url = "{{url('/api/admin/section/destroy')}}";
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