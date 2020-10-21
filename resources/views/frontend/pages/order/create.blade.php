@extends('frontend.layouts.app-user')
@section('title', 'brand Management')
@section('user-content')
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8 col-sm-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Manage order</h4>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-sm-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#brand"><i class="ti-plus"></i></button>
                            </li>
                        </ul>
                    </div>
                </div> --}}
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
                                        <th> Order id</th>
                                        <th> payment_option</th>
                                    
                                        <th> payemnt status</th>
                                        <th> order status</th>
                                        <th> Total Price</th>
                                        <th> Order Details</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="brandCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                            <h5 class="modal-title" id="modalLabel">Add brand</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form id="myform" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                            <div class="modal-body">
                            
                                    
                                    <div class="form-group row">
                                    
                                        <label class="col-sm-5 col-form-label">update payment status </label>
                                        <div class="col-sm-5">
                                            <span class="messages"></span>
                                            <select class="form-control "  id="is_paid" name="is_paid">
                                                <option value="1" selected>Confirm</option>
                                                    <option value="0" >Not Confirm</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">Order Status</label>
                                        <div class="col-sm-5">
                                            <span class="messages"></span>
                                            <select class="form-control "  id="is_completed" name="is_completed">
                                                    <option value="1" selected>Confirm order</option>
                                                    <option value="0" >Not Confirm</option>
                                            </select>
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
                ajax:"{{url('/user/order/synctable')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'id', name: 'id' }, 
                    { data: 'payment_option', name: 'payment_option' },
                   
                    { data: 'is_paid', name: 'is_paid' },
                    { data: 'is_completed', name: 'is_completed' },
                    { data: 'totalprice', name: 'totalprice' },
                    { data: 'OrderDetails', name: 'OrderDetails' },
                    
                    { data: 'action', name: 'action' }
                ]
            });
//  $(document).ready(function () {
//     $('#myform').on('submit',function(e) {
               
//                var id=$('#submit').val();
//                if(id>0){
//                    console.log(`submit id:`+id);
//                }
//                var formData=new FormData(this);
//                $.ajaxSetup({
//                    headers: {
//                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                        }
//                });
//                if (id>0) {
//                    var url="{{url('/user/order/update')}}"+"/"+id;
//                }
//                $.ajax({

//                    type: "post",
//                    url: url,
               
//                     data:formData,
//                     cache:false,
//                     contentType: false,
//                     processData: false,
 
//                    success: function (result) {
//                        console.log(result);
//                        if (result.error==false) {
//                            $( "div").remove( ".text-danger" );
//                            successNotification();
//                            removeUpdateProperty("order");
//                            document.getElementById("myform").reset();
//                        }
//                        if(result.error==true){
//                            getError(result.message);
//                        }
//                    }

//                });
//            });    
//  });
//             //submit function
            
//             //edit view
            // function btnEdit(id)
            // {
            //     setUpdateProperty(id, "order","brand","submit");
            //     var url="{{url('/user/order/edit')}}";
            //     $.ajax({
            //         type:'GET',
            //         url:url+"/"+id,
            //         success:function(result) {
                       

            //             }
            //          });
            //  }
//             //delete
//             function btnDelete (id) {
//                 var url = "{{url('/api/admin/brand/destroy')}}";
//                var con=confirm("Danger ! You Are Going To Delete Data ");
//                 if(con==true){
//                 $.ajax({
//                    url:url+"/"+id,
//                    type:"GET",
//                    dataType:"json",
//                    success:function(data) {               
//                        table.draw();
//                    }
//                })
//             }else{
//                 alert("Data is Safe");
//             }
//             }   
    </script>

    @endsection