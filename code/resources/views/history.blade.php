<?php $roles=App\Http\Controllers\RolesController::getroles(); ?>
@extends('layouts.app')

@section('content')

<div class="modal fade" id="modal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Credit Note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="hid" name="hid">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="rate">CCM Reference No.</label>
                            <input type="text" class="form-control" id="reference_no" name="reference_no" placeholder="Enter CCM Reference No" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Credit Note amount </label>
                            <input type="text" class="form-control" id="credit_note_amount" name="credit_note_amount" placeholder="Enter Credit Note amount" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="rate">Invoice No.</label>
                            <input type="text" class="form-control" id="invove_no" name="invove_no" placeholder="Enter Invoice No" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="levy">AWB No</label>
                            <input type="text" class="form-control" id="awb" name="awb" placeholder="Enter AWB No" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Calculation</label>
                            <input type="text" class="form-control" id="calculation" name="calculation" placeholder="Enter Calculation" >
                        </div>
                    </div>
                    <div class="row">   
                        <div class="form-group col-md-8">
                            <label for="rate">CRM Description</label>
                            <textarea  type="text" class="form-control" id="crm_description" name="crm_description" placeholder="Enter Description" required ></textarea>
                        </div>                   
                        <div class="form-group col-md-4">
                            <div class="text-right">
                                <button type="button" class="btn btn-outline-primary attachment">Attachment</button>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="rate">Credit Note Date </label>
                            <input type="date" class="form-control" id="credit_date" name="credit_date" placeholder="Enter Credit Note amount">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rate">Credit Note status </label>
                            <select name="credit_status" id="credit_status" class="form-control" required data-live-search="true" data-size="5">
                                <option value="0">-- select User --</option>
                                <option value="1">Pending</option>
                                <option value="2">Close</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                <span class="bg-red">Mr Hiran</span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                        <h3 class="timeline-header"><a href="#">Credit Note Team</a> sent you an email</h3>
                                        <div class="timeline-body" id="description" name="description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="assign_description_textarea">
                        {{-- <button type="button" class="btn btn-primary" id='assign_description_textareas'>Add Section</button> --}}
                    </div>
                    {{-- <div id="description_type"></div> --}}

                </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-success edit_submit" id="edit_submit">Save changes</button>
          </div>
      </div>
    </div>
</div>

{{-- Add Description --}}

<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Credit Note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="myForm" enctype="multipart/form-data">
                    <input type="hidden" id="add_hid" name="add_hid">
                    <input type="hidden" id="add_credit_hid" name="add_credit_hid">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="rate">CCM Reference No.</label>
                            <input type="text" class="form-control" id="add_customer_name" name="add_customer_name" placeholder="Enter CCM Reference No" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Customer Name</label>
                            <input type="text" class="form-control" id="add_customer_name" name="add_customer_name" placeholder="Enter Customer Name" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Credit Note amount </label>
                            <input type="text" class="form-control" id="add_credit_note_amount" name="add_credit_note_amount" placeholder="Enter Credit Note amount" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="rate">Invoice No.</label>
                            <input type="text" class="form-control" id="add_invove_no" name="add_invove_no" placeholder="Enter Invoice No" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="levy">AWB No</label>
                            <input type="text" class="form-control" id="add_awb" name="add_awb" placeholder="Enter AWB No" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Calculation</label>
                            <input type="text" class="form-control" id="add_calculation" name="add_calculation" placeholder="Enter Calculation" readonly>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="form-group col-md-8">
                            <label for="rate">CRM Description</label>
                            <textarea  type="text" class="form-control" id="add_crm_description" name="add_crm_description" placeholder="Enter Description" required readonly></textarea>
                        </div>                   
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="rate">Description</label>
                            <textarea  type="text" class="form-control" id="add_description" name="description" placeholder="Enter Description" required ></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Assign User</label>
                            <select name="add_assign_user" id="add_assign_user" class="form-control" required data-live-search="true" data-size="5">
                                <option value="">-- select User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id}}">{{ $user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        
                    
                </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-success add_submit" id="add_submit">Save changes</button>
          </div>
      </div>
    </div>
</div>


{{-- Attachment modal --}}

<div class="modal fade" id="modal_attachment">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Credit Note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="myForm_attachment" enctype="multipart/form-data">
                    <input type="hidden" id="attachment_hid" name="attachment_hid">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="rate">Attachment</label>
                            <input type="file" class="form-control" id="attachement_path" name="attachement_path" placeholder="Enter CCM Reference No">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <button class="btn btn-primary addNew"><i class="fa fa-plus"></i> Add New Employee</button>
                    </div> --}}
                    <div class="card-body">
                        <table class="table table-bordered" id="attachmet_datatable">
                            <thead>
                                <tr>
                                    <th style="width:20%">Reference Name</th>
                                    <th style="width:30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-primary attachment_submit" id="attachment_submit">Save changes</button>
          </div>
      </div>
    </div>
</div>

{{-- assign user change --}}

<div class="modal fade" id="modal_assign_user_change">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="attachment_hid" name="attachment_hid">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <span class="time"><i class="fas fa-clock"></i> credated at :</span>
                            <textarea type="text" class="form-control" id="assign_user_change_description" name="assign_user_change_description"></textarea>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <span class="assign_userfuther_description"><i class="fas fa-clock"></i> credated at :</span>
                            <textarea type="text" class="form-control" id="assign_user_change_futher_description" name="assign_user_change_futher_description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="rate">Assign User</label>
                            <select name="assign_user_change" id="assign_user_change" class="form-control" required data-live-search="true" data-size="5">
                                <option value="">-- select User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id}}">{{ $user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-primary user_change_submit" id="user_change_submit">Save changes</button>
          </div>
      </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Credit Note</li>
            </ol>
          </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <button class="btn btn-primary addNew"><i class="fa fa-plus"></i> Add New Employee</button>
                </div> --}}
                <div class="card-body">
                    <table class="table table-bordered" id="datatables">
                        <thead>
                            <tr>
                                <th style="width:10%">Reference Name</th>
                                <th style="width:15%">Customer Name</th>
                                <th style="width:10%">AWB</th>
                                <th style="width:10%">Invoice No</th>
                                <th style="width:10%">Credit Amount</th>
                                <th style="width:10%">Action</th>
                                <th style="width:30%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        //csrf token error
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //datatable show
        show_employee();

        
        //select 2 convert
            $('#assign_user_one').select2({
                theme: 'bootstrap4'
            });

        //attachment button
        $(document).on("click", ".attachment", function(){

            var hid = $("#hid").val();
            show_attachment(hid);
            $("#modal_attachment").modal('show');
            $(".modal-title").html('Credit Note Attachment');
            $("#attachment_submit").html('Attachment Submit');

            $("#attachment_hid").val(hid);

            $("#attachment_submit").click(function(){

            if($("#hid").val() != ""){
                var id =$("#hid").val();

                var formData = new FormData($('#myForm_attachment')[0]);

                Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Update it!'
                        }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                'type': 'ajax',
                                'dataType': 'json',
                                'method': 'post',
                                'data' : formData,
                                'url': 'creditnote_attachment',
                                'processData': false,
                                'contentType': false,
                                success:function(data){
                                if(data.validation_error){
                                    validation_error(data.validation_error);//if has validation error call this function
                                    }

                                    if(data.db_error){
                                    db_error(data.db_error);
                                    }

                                    if(data.db_success){
                                    toastr.success(data.db_success);
                                    setTimeout(function(){
                                        $("#modal").modal('hide');
                                        location.reload();
                                    }, 2000);
                                    }
                                },
                            });
                        }
                    });
                }
            });
            
        });

        //complain edit
        $(document).on("click", ".edit", function(){
            // $("#submit").css("display","none");
            var id = $(this).attr('data');

            // empty_form();
            
            $("#hid").val(id);
            $("#edit_submit").html('Update Credit Note');
            $("#modal").modal('show');
            $(".modal-title").html('Add Credit Note History');

            assign_description();
            // description_app ();
            $.ajax({
                'type': 'ajax',
                'dataType': 'json',
                'method': 'get',
                'url': 'credit_note/'+id,
                'async': false,
                success: function(data){
                    $("#reference_no").val(data.reference_number);
                    $("#customer_name").val(data.customer_name);
                    $("#credit_note_amount").val(data.credit_note_amount);
                    $("#invove_no").val(data.invoice_no);
                    $("#awb").val(data.awb);
                    $("#calculation").val(data.calculation);
                    $("#crm_description").val(data.crm_description);
                    $("#description").html(data.description);
                    $("#credit_date").val(data.crdit_note_close_date);
                    $("#credit_status").val(data.crdit_note_status);
                }
            });
            //user button click submit data to controller
            $("#edit_submit").click(function(){

                if($("#hid").val() != ""){

                    var id =$("#hid").val();
                    var reference_no = $("#reference_no").val();             
                    var customer_name=$("#customer_name").val();
                    var credit_note_amount=$("#credit_note_amount").val();
                    var invove_no=$("#invove_no").val();
                    var awb=$("#awb").val();
                    var calculation=$("#calculation").val();
                    var crm_description=$("#crm_description").val();
                    var description=$("#description").val();
                    var credit_date=$("#credit_date").val();
                    var credit_status=$("#credit_status").val();

                    Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Update it!'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    'type': 'ajax',
                                    'dataType': 'json',
                                    'method': 'put',
                                    'data' : {reference_no:reference_no,customer_name:customer_name,credit_note_amount:credit_note_amount,invove_no:invove_no,awb:awb,calculation:calculation,crm_description:crm_description,description:description,credit_date:credit_date,credit_status:credit_status},
                                    'url': '/history/'+id,
                                    'async': false,
                                    success:function(data){
                                        
                                    if(data.validation_error){
                                        validation_error(data.validation_error);//if has validation error call this function
                                        }

                                        if(data.db_error){
                                            console.log(data);
                                        db_error(data.db_error);
                                        }

                                        if(data.db_success){
                                        toastr.success(data.db_success);
                                        setTimeout(function(){
                                            $("#modal").modal('hide');
                                            location.reload();
                                        }, 2000);
                                        }
                                    },
                                });
                            }
                        });
                }
            });
        });

        //assign user change
        $(document).on("click", ".user_assign", function(){
            var id = $(this).attr('data');
            console.log(id);
            var credit_not_id =$("#hid").val();

            $("#user_change_submit").html('Update Assign User');
            $("#modal_assign_user_change").modal('show');

            $.ajax({
                'type': 'ajax',
                'dataType': 'json',
                'method': 'get',
                'url': 'history/'+id,
                'async': false,
                success: function(data){
                    for(var i = 0; i < data.length; i++){
                        $(".time").html(data[i].username)
                        $("#assign_user_change_description").val(data[i].assign_user_description);
                        $(".assign_userfuther_description").html(data[i].futherusername)
                        $("#assign_user_change_futher_description").val(data[i].futher_assign_user_description);
                    }
                }
            });
            $("#user_change_submit").click(function(){

                var assign_user_change = $("#assign_user_change").val();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Update it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                'type': 'ajax',
                                'dataType': 'json',
                                'method': 'post',
                                'data' :{id:id,credit_not_id:credit_not_id,assign_user_change:assign_user_change},
                                'url': 'history/assign_user_change',
                                'async': false,
                                success: function(data){

                                if(data){
                                    toastr.success('User Assign');
                                    setTimeout(function(){
                                    location.reload();
                                    }, 2000);

                                }

                                }
                            });

                        }

                });
            });
        });

        //credit note report download
        $(document).on("click", ".download", function(){
            var id = $(this).attr('data');

            window.open('credit_note_report/'+id, '_blank');

        });

            //credit note delete
            $(document).on("click", ".delete", function(){
            var id = $(this).attr('data');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            'type': 'ajax',
                            'dataType': 'json',
                            'method': 'delete',
                            'url': 'history/'+id,
                            'async': false,
                            success: function(data){

                            if(data){
                                toastr.success('Credit Note Deleted');
                                setTimeout(function(){
                                location.reload();
                                }, 2000);

                            }

                            }
                        });

                    }

            });

        });
    });
    function assign_description() {

        var id =$("#hid").val();

        let description=$.ajax({
            'type': 'ajax',
            'dataType': 'json',
            'method': 'get',
            'url': 'credit_note/description/'+id,
            'async': false,
        }); 
        description.done(function(res){  
            var html = "";

            for(var i=0;i<res.length;i++){
                html +='<div class="row">'
                    html +='<div class="col-md-12">'
                        html +='<div class="timeline">'
                            html +='<div class="time-label">'
                                html +='<span class="bg-red">Mr '+res[i].name+'</span>'
                            html +='</div>'
                            html +='<div>'
                            html +='<i class="fas fa-envelope bg-blue"></i>'
                            html +='<div class="timeline-item">'
                                html +='<span class="time"><i class="fas fa-clock"></i>'+res[i].created_at+'</span>'
                                html +='<h3 class="timeline-header"><a href="#">Credit Note Team</a> sent you an email</h3>'
                            html +='<div class="timeline-body">'
                                html+=res[i].assign_user_description
                            html +='</div>'
                            html +='</div>'
                            html +='</div>'
                            html +='<div>'
                                html +='<i class="fas fa-user bg-green"></i>'
                                html +='<div class="timeline-item">'
                                    html +='<span class="time"><i class="fas fa-clock"></i> '+res[i].updated_at+'</span>'
                                    html +='<h3 class="timeline-header no-border"><a href="#">Assign by mr '+res[i].name+'</a> to mr '+res[i].username+'</h3>'
                                html +='</div>'
                                html +='</div>'
                                html +='<div>'
                                    html +='<i class="fas fa-comments bg-yellow"></i>'
                                    html +='<div class="timeline-item">'
                                        html +='<span class="time"><i class="fas fa-clock"></i> '+res[i].updated_at+'</span>'
                                        html +='<h3 class="timeline-header"><a href="#">mr '+res[i].username+'</a> commented on your post</h3>'
                                        html +='<div class="timeline-body">'
                                            html+=res[i].futher_assign_hod_description
                                        html +='</div>'
                                    html +='</div>'
                                    html +='<div class="timeline-item">'
                                        html +='<span class="time"><i class="fas fa-clock"></i> '+res[i].updated_at+'</span>'
                                        html +='<h3 class="timeline-header"><a href="#">mr '+res[i].username+'</a> commented on your post</h3>'
                                        html +='<div class="timeline-body">'
                                            html+=res[i].futher_assign_user_description
                                        html +='</div>'
                                    html +='</div>'
                                    html+='<div class="text-right">';
                                        if(res[i].status == '0'){
                                            html +='<br>'
                                            html+='<i class="fa fa-check" style="color:green">Approve</i>&nbsp;&nbsp;';
                                            html+='<button type="button" class="btn btn-outline-dark btn-sm user_assign" data='+res[i].id+'>Edit</button>';
                                        }else if(res[i].status == '1'){
                                            html +='<br>'
                                            html+='<i class="fa fa-window-close" style="color:red">&nbsp;Reject</i>&nbsp;&nbsp;'; 
                                            html+='<button type="button" class="btn btn-outline-dark btn-sm user_assign" data='+res[i].id+'>Edit</button>';
                                        }else{
                                            html +='<br>'
                                            html+='<i class="fas fa-spinner" style="color:#ffcc00">&nbsp;Pending</i>&nbsp;&nbsp;';
                                        }

                                html+='</div>';
                                html +='</div>'
                        html +='</div>'
                    html +='</div>'

                html +='</div>'    
            }
            $("#assign_description_textarea").append(html);
            
        });
    }

    //Data Table show
    function show_employee(){

        $('#datatables').DataTable().clear();
        $('#datatables').DataTable().destroy();

        $("#datatables").DataTable({
            'processing': true,
            'serverSide': true,
            "bLengthChange": false,
            "autoWidth": false,
            "recordsFiltered": 28,
            'ajax': {
                        'method': 'get',
                        'url': '/history/create'
                    },
            'columns': [
                {data: "reference_number"},
                {data: "customer_name"},
                {data: "awb"},
                {data: "invoice_no"},
                {data: "credit_note_amount"},
                {
                    data: null,
                    render: function(d){
                        var html = "";
                        html+="&nbsp;&nbsp;<td><button class='btn btn-primary btn-sm edit' data='"+d.id+"' title='Edit'><i class='fas fa-arrow-alt-circle-left'></i></i></button>";
                        html+="&nbsp;<button class='btn btn-danger btn-sm delete' data='"+d.id+"'title='Delete'><i class='fas fa-trash'></i></button>";
                        html+="&nbsp;<button class='btn btn-success btn-sm download' data='"+d.id+"'title='File Download'><i class='fas fa-download'></i></button>";    

                        return html;

                    }

                },
                {
                    data: null,
                    render: function(d){
                        var html = "";    
                        html+='&nbsp;&nbsp;<i class="bg-dark" > Assign to - &nbsp;'+d.name+'</i>&nbsp;&nbsp;';
                        if (d.crdit_note_status == 1){
                                    html+='&nbsp;&nbsp;<i class="bg-warning"> status - &nbsp; Pennding</i>&nbsp;&nbsp;';
                                }else if(d.crdit_note_status == 2){
                                    html+='&nbsp;&nbsp;<i class="bg-success" > status - &nbsp; Close</i>&nbsp;&nbsp;';
                                }else{
                                    html+='&nbsp;&nbsp;<i class="bg-danger" > status - &nbsp; New</i>&nbsp;&nbsp;';
                                }
                                html+='&nbsp;&nbsp;<i class="bg-primary" > Assign to - &nbsp;'+d.futhername+'</i>&nbsp;&nbsp;';
                        return html;

                    }

                }
            ]
        });
    }

        //Data Table show
        function show_attachment(hid){

            $('#attachmet_datatable').DataTable().clear();
            $('#attachmet_datatable').DataTable().destroy();

            $("#attachmet_datatable").DataTable({
                'processing': true,
                'serverSide': true,
                "bLengthChange": false,
                "autoWidth": false,
                "recordsFiltered": 28,
                'ajax': {
                            'method': 'get',
                            'url': '/creditnote_attachment/'+hid,
                        },
                'columns': [
                    {data: "creditnote_id"},
                    {
                        data: null,
                        render: function(d){
                            var html = "";
                            html+="&nbsp;<button class='btn btn-danger btn-sm delete' data='"+d.id+"'title='Delete'><i class='fas fa-trash'></i></button>";
                            return html;

                        }

                    }
                ]
            });
        }
    function empty_form(){
        $("#first_name").val("");
        $("#last_name").val("");
        $("#company").val("");
        $("#employee_email").val("");
        $("#phone_no").val("");
        $("#profile_image").val("");

    }

    function validation_error(error){
        for(var i=0;i< error.length;i++){
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error[i],
            });
        }
    }

    function db_error(error){
        Swal.fire({
            icon: 'error',
            title: 'Database Error',
            text: error,
        });
    }

    function db_success(message){
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: message,
        });
    }
</script>
@endsection
