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
                        <span>Manage Brand</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#brand"><i class="ti-plus"></i></button>
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
                                    <th> Image</th>
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
                        <div class="modal-body">
                            <form id="myform" method="post" action="javascript:void(0)" novalidate="">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="brand_name" id="brand_name"  required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Status</label>
                                    <div class="col-sm-5">
                                        <span class="messages"></span>
                                        <select class="form-control "  id="status" name="status">
                                                <option value="1" selected>Active</option>
                                                <option value="0" >Inactive</option>
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
                ajax:"{{url('admin/section/synctable')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'status', name: 'status' },
                    { data: 'img', name: 'img' },
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
                    var url="{{url('admin/section/update')}}"+"/"+id;
                }else{
                var url="{{url('admin/section/store')}}"
                }
                $.ajax({

                    type: "post",
                    url: url,
                    data: {
                        name: $('#name').val(),
                        status: $('#status').val(),
                    },
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
            //edit view
            function btnEdit(id)
            {
                setUpdateProperty(id, "section","section","submit");
                var url="{{url('/admin/section/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(result) {
                        $('#name').val(result.data.name);
                        $('#status').val(result.data.status);
                        
                        }
                     });
             }
            //delete
            function btnDelete (id) {
                var url = "{{url('/admin/section/destroy')}}";
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