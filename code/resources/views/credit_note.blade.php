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
                <form  id="myForm" enctype="multipart/form-data">
                    <input type="hidden" id="hid" name="hid">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="rate">CCM Reference No.</label>
                            <input type="text" class="form-control" id="reference_no" name="reference_no" placeholder="Enter CCM Reference No" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Credit Note amount </label>
                            <input type="text" class="form-control" id="credit_note_amount" name="credit_note_amount" placeholder="Enter Credit Note amount" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="rate">Invoice No.</label>
                            <input type="text" class="form-control" id="invove_no" name="invove_no" placeholder="Enter Invoice No" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="levy">AWB No</label>
                            <input type="text" class="form-control" id="awb" name="awb" placeholder="Enter AWB No" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rate">Calculation</label>
                            <input type="text" class="form-control" id="calculation" name="calculation" placeholder="Enter Calculation" readonly>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="form-group col-md-8">
                            <label for="rate">CRM Description</label>
                            <textarea  type="text" class="form-control" id="crm_description" name="crm_description" placeholder="Enter Description" required readonly></textarea>
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
                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
              
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
            <button type="button" class="btn btn-outline-success submit" id="submit">Save changes</button>
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
                    <div class="card-header">
                        <h3 class="card-title">HOD Description</h3>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="rate">{{Auth::user()->name}}</label>
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
                    <div class="card-header">
                        <h3 class="card-title">Futher Explanation</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <br>   
                    <div class="row">   
                        <div class="form-group col-md-8">
                            <label for="rate">Futher Explanation HOD Description</label>
                            <textarea  type="text" class="form-control" id="futher_description" name="futher_description" placeholder="Enter Description"></textarea>
                        </div>                   
                        <div class="form-group col-md-4">
                            <label for="rate">Assign User</label>
                            <select name="futher_assign_user" id="futher_assign_user" class="form-control" required data-live-search="true" data-size="5">
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

{{-- further explanation modal --}}

<div class="modal fade" id="modal_explantion">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Credit Note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="" enctype="multipart/form-data">
                    <input type="hidden" id="attachment_hid" name="attachment_hid">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="rate">Assign User</label>
                            <select name="further_assign_user" id="further_assign_user" class="form-control" required data-live-search="true" data-size="5">
                                <option value="">-- select User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id}}">{{ $user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>  
                    {{-- <div class="row">
                        <div class="form-group col-md-8">
                            <label for="rate">Explanation</label>
                            <textarea type="text" class="form-control" id="attachement_path" name="attachement_path" placeholder="Enter CCM Reference No"></textarea>
                        </div>
                    </div> --}}
                </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-primary attachment_submit" id="futher_explanation_submit">Save changes</button>
          </div>
      </div>
    </div>
</div>

{{-- further explanation modal --}}

<div class="modal fade" id="modal_user_explantion">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Credit Note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="" enctype="multipart/form-data">
                    <input type="hidden" id="attachment_hid" name="attachment_hid">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="rate">Explanation</label>
                            <textarea type="text" class="form-control" id="futher_explanation_desc" name="futher_explanation_desc" placeholder="Enter CCM Reference No"></textarea>
                        </div>
                    </div>
                </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-primary attachment_submit" id="user_futher_explanation_submit">Save changes</button>
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
                                <th style="width:15%">Reference Name</th>
                                <th style="width:15%">Customer Name</th>
                                <th style="width:20%">AWB</th>
                                <th style="width:10%">Invoice No</th>
                                <th style="width:10%">Credit Amount</th>
                                <th style="width:35%">Action</th>
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

        // add new 
        $(document).on("click",".addNew",function(){

            empty_form();

            $("#addnew").modal('show');
            $(".modal-title").html('Save Credit Note');
            $("#add_submit").html('Save Credit Note');
            var id = $(this).attr('data');

            $("#add_credit_hid").val(id);

            $.ajax({
                'type': 'ajax',
                'dataType': 'json',
                'method': 'get',
                'url': 'credit_note/'+id,
                'async': false,
                success: function(data){
                    $("#add_reference_no").val(data.reference_number);
                    $("#add_customer_name").val(data.customer_name);
                    $("#add_credit_note_amount").val(data.credit_note_amount);
                    $("#add_invove_no").val(data.invoice_no);
                    $("#add_awb").val(data.awb);
                    $("#add_calculation").val(data.calculation);
                    $("#add_crm_description").val(data.crm_description);
                }
            });


            $("#add_submit").click(function(){
                $("#add_submit").css("display","none");
                var add_hid =$("#add_hid").val();
                //save bank
                if(add_hid == ""){
                    var add_description =$("#add_description").val();
                    var add_assign_user =$("#add_assign_user").val();
                    var add_credit_hid =$("#add_credit_hid").val();
                    var futher_description =$("#futher_description").val();
                    var futher_assign_user =$("#futher_assign_user").val();
                    
                    $.ajax({
                    'type': 'ajax',
                    'dataType': 'json',
                    'method': 'post',
                    'data' : {add_description:add_description,add_assign_user:add_assign_user,add_credit_hid:add_credit_hid,futher_description:futher_description,futher_assign_user:futher_assign_user},
                    'url' : 'credit_note',
                    'async': false,
                    success:function(data){
                        add_email_send();
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
                    error: function(jqXHR, exception) {
                        db_error(jqXHR.responseText);
                    }
                    });
                };
            });
        });


        //complain edit
        $(document).on("click", ".edit", function(){
            $("#submit").css("display","none");
            var id = $(this).attr('data');

            empty_form();
            
            $("#hid").val(id);
            
            $("#modal").modal('show');
            $(".modal-title").html('Add Credit Note');
            $("#submit").html('Add Credit Note');
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
                }
            });
            //user button click submit data to controller
            $("#submit").click(function(){

                if($("#hid").val() != ""){
                    var id =$("#hid").val();
                    console.log(id);
                    var description = $("#description").val();             
                    var assign_user=$("#assign_user_one").val();
                    var formData = new FormData($('#myForm')[0]);

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
                                    'url': 'credit_note/update',
                                    'async': false,
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

        //employee delete
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
                            'url': 'employee/'+id,
                            'async': false,
                            success: function(data){

                            if(data){
                                toastr.success('Employee Deleted');
                                setTimeout(function(){
                                location.reload();
                                }, 2000);

                            }

                            }
                        });

                    }

            });

        });

        $(document).on("click", ".assign_user_", function(){

            var id = $("#hid").val();
            
            $.ajax({
                'type': 'ajax',
                'dataType': 'json',
                'method': 'get',
                'url': 'credit_note/assignuser/'+id,
                'async': false,
                success: function(data){
                    console.log(data);
                    var html = "";

                    html+="<option value=''>-- select user --</option>";
 
                        for(var i =0; i < data.length; i++){
                            html+="<option value='"+data[i].id+"'>"+data[i].email+"</option>";
                        }

                    $("#assign_user_one").html(html);
                    //$("#assign_user_one").select2("destroy");

                }
            });    

        });

        $(document).on("click", ".explanation", function(){
            var descreption_id = $(this).attr('data');
            var credit_note_id =$("#hid").val();
            $("#modal_explantion").modal('show');

            $("#futher_explanation_submit").click(function(){
                // if(credit_note_id == ""){
                    var further_assign_user =$("#further_assign_user").val();

                    $.ajax({
                        'type': 'ajax',
                        'dataType': 'json',
                        'method': 'post',
                        'data' : {descreption_id:descreption_id,credit_note_id:credit_note_id,further_assign_user:further_assign_user},
                        'url' : 'credit_note/futher_explanantion',
                        'async': false,
                        success:function(data){
                            add_email_send();
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
                        error: function(jqXHR, exception) {
                            db_error(jqXHR.responseText);
                        }
                    });
                //}
            });
        });

        $(document).on("click", ".user_explanation", function(){
            var id = $(this).attr('data');
            console.log(id);
            $("#modal_user_explantion").modal('show');

            $("#user_futher_explanation_submit").click(function(){
                // if(credit_note_id == ""){
                    var futher_explanation_desc =$("#futher_explanation_desc").val();

                    console.log(futher_explanation_desc)

                    $.ajax({
                        'type': 'ajax',
                        'dataType': 'json',
                        'method': 'post',
                        'data' : {futher_explanation_desc:futher_explanation_desc,id:id},
                        'url' : 'credit_note/user_futher_explanantion',
                        'async': false,
                        success:function(data){
                            add_email_send();
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
                        error: function(jqXHR, exception) {
                            db_error(jqXHR.responseText);
                        }
                    });
                //}
            });
        });

        $(document).on("click", ".approve", function(){
            var id = $(this).attr('data');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            'type': 'ajax',
                            'dataType': 'json',
                            'method': 'get',
                            'url': '/credit_note/approve/'+id,
                            'async': false,
                            success: function(data){

                            if(data){
                                toastr.success('Description Approved');
                                setTimeout(function(){
                                location.reload();
                                }, 2000);

                            }

                            }
                        });

                    }

            });

        });

        $(document).on("click", ".reject", function(){
            var id = $(this).attr('data');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Reject it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            'type': 'ajax',
                            'dataType': 'json',
                            'method': 'get',
                            'url': '/credit_note/reject/'+id,
                            'async': false,
                            success: function(data){

                            if(data){
                                toastr.error('Description Rejected');
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

    function add_email_send(){
        var id =$("#add_assign_user").val();

        $.ajax({
                'type': 'ajax',
                'dataType': 'json',
                'method': 'get',
                'url': 'email/'+id,
                'async': false,
                success: function(data){
                    console.log('email sent');
                }
            })  
    }

    function further_email_send(){
        var id =$("#add_assign_user").val();

        $.ajax({
                'type': 'ajax',
                'dataType': 'json',
                'method': 'get',
                'url': 'email/'+id,
                'async': false,
                success: function(data){
                    console.log('email sent');
                }
            })  
    }

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
                                html +='<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>'
                            html +='<div class="timeline-body">'
                                html+=res[i].assign_user_description
                            html +='</div>'
                            html +='</div>'
                            html +='</div>'
                            html +='<div>'
                                html +='<i class="fas fa-user bg-green"></i>'
                                html +='<div class="timeline-item">'
                                    html +='<span class="time"><i class="fas fa-clock"></i> '+res[i].updated_at+'</span>'
                                    html +='<h3 class="timeline-header no-border"><a href="#">Assign by mr '+res[i].name+'</a> to '+res[i].username+'</h3>'
                                html +='</div>'
                                html +='</div>'
                                html +='<div>'
                                    html +='<i class="fas fa-comments bg-yellow"></i>'
                                    html +='<div class="timeline-item">'
                                        html +='<span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>'
                                        html +='<h3 class="timeline-header"><a href="#">mr '+res[i].username+'</a> commented on your post</h3>'
                                        html +='<div class="timeline-body">'
                                            html+=res[i].futher_assign_user_description
                                        html +='</div>'
                                    html +='</div>'
                                    html+='<div class="text-right">';
                                        if(res[i].status == '0'){
                                            html+='<i class="fa fa-check" style="color:green">Approve</i>&nbsp;&nbsp;';
                                            @if ($roles->contains('role_id',4))
                                            @endif
                                        }else if(res[i].status == '1'){
                                            html+='<i class="fa fa-window-close" style="color:red">&nbsp;Reject</i>&nbsp;&nbsp;'; 
                                        }else{
                                            html+='<button type="button" class="btn btn-outline-success btn-sm approve" data='+res[i].id+'>Approve</button>';
                                            html+='&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger btn-sm reject" data='+res[i].id+'>Reject</button>';
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
                        'url': '/credit_note/create'
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
                        html+="&nbsp;&nbsp;<td><button class='btn btn-primary btn-sm addNew' data='"+d.id+"' title='Add'><i class='fa fa-plus' ></i></button>";
                        html+="&nbsp;&nbsp;<td><button class='btn btn-warning btn-sm edit' data='"+d.id+"' title='Edit'><i class='fas fa-edit' ></i></button>&nbsp;&nbsp;";
                        html+='&nbsp;&nbsp;<i class="" style="color:red"> Assign to - &nbsp;'+d.name+'</i>&nbsp;&nbsp;';
                        if (d.crdit_note_status == 1){
                            html+='&nbsp;&nbsp;<i class="" style="color:green"> status - &nbsp; Pennding</i>&nbsp;&nbsp;';
                        }else{
                            html+='&nbsp;&nbsp;<i class="" style="color:red"> status - &nbsp; Close</i>&nbsp;&nbsp;';
                        }
                        
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
