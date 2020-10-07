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
                        <h4>Manage Supplier</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#supplier"><i class="ti-plus"></i></button>
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
                                    <th>SL</th>
                                    <th data-priority="">official Name</th>
                                    <th data-priority="">official Mobile</th>
                                    <th data-priority="">official Email</th>
                                    <th data-priority="">official Address</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="modal fade" id="supplier" tabindex="-1" role="dialog" aria-labelledby="sectionCenterTitle" aria-hidden="true">
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
                                    <label class="col-sm-5 col-form-label">Official Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="official_name" id="official_name"  required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Official Email</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="official_email" id="official_email"  required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Official Phone</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="official_mobile" id="official_mobile"  required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Official address</label>
                                    <div class="col-sm-5">
                                        <textarea name="official address" id="official_address" cols="10" rows="5" class="form-control"></textarea>
                                        <span class="messages"></span>
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
                ajax:"{{url('/api/admin/supplier/synctable')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'official_name', name: 'official_name' },
                    { data: 'official_mobile', name: 'official_mobile' },
                    { data: 'official_email', name: 'official_email' },
                    { data: 'official_address', name: 'official_address' },
                    
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
                   var url="{{url('/api/admin/supplier/update')}}"+"/"+id;
               }else{
               var url="{{url('/api/admin/supplier/store')}}"
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
                           removeUpdateProperty("supplier");
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
                setUpdateProperty(id, "supplier","supplier","submit");
                var url="{{url('/api/admin/supplier/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(result) {
                        console.log(result);
                        $('#official_name').val(result.data.official_name);
                        $('#official_email').val(result.data.official_email);
                        $('#official_mobile').val(result.data.official_mobile);
                        $('#official_address').val(result.data.official_address);
                        
                      
                        
                        }
                     });
             }
            //delete
            function btnDelete (id) {
                var url = "{{url('/api/admin/supplier/destroy')}}";
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