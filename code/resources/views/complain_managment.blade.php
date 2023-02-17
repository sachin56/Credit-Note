
@extends('layouts.app')

@section('content')

<div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg">
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
                        <div class="form-group col-md-6">
                            <label for="rate">CCM Reference No.</label>
                            <input type="text" class="form-control" id="ref_no" name="ref_no" placeholder="Enter CCM Reference No">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="rate">Customer Name</label>
                            <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Enter Customer Name">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="rate">Invoice No.</label>
                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="Enter Invoice No">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="levy">AWB No</label>
                            <input type="text" class="form-control" id="awb" name="awb" placeholder="Enter AWB No">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="rate">CRM Description</label>
                            <textarea type="text" class="form-control" id="crm_description" name="crm_description" placeholder="Enter Description" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="rate">Credit Note amount </label>
                            <input type="text" class="form-control" id="credit_amount" name="credit_amount" placeholder="Enter Credit Note amount">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="rate">Calculation</label>
                            <input type="text" class="form-control" id="calculation" name="calculation" placeholder="Enter Calculation">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">   
                            <label for="rate">Hiran</label>
                            <textarea  type="text" class="form-control" id="description" name="description" placeholder="Enter Description" required></textarea>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success submit" id="submit">Save changes</button>
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
              <li class="breadcrumb-item active">Complain Managment</li>
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
                                <th style="width:20%">Account Name</th>
                                <th style="width:20%">AWB</th>
                                <th style="width:20%">Assign User</th>
                                <th style="width:20%">Action</th>
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
            $('#company').select2({
                theme: 'bootstrap4'
            });
        // add new employee
        $(document).on("click",".addNew",function(){

            //open the model remove previous values
            empty_form();

            $("#modal").modal('show');
            $(".modal-title").html('Save Employee');
            $("#submit").html('Save Employee');
            $("#submit").click(function(){
                $("#submit").css("display","none");
                var hid =$("#hid").val();
                //save emplyee
                if(hid == ""){
                    var first_name =$("#first_name").val();
                    var last_name =$("#last_name").val();
                    var company =$("#company").val();
                    var employee_email =$("#employee_email").val();
                    var phone_no =$("#phone_no").val();

                    var formData = new FormData($('#myForm')[0]);

                    $.ajax({
                    'type': 'ajax',
                    'dataType': 'json',
                    'method': 'post',
                    'data' : formData,
                    'url' : 'employee',
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
                    error: function(jqXHR, exception) {
                        db_error(jqXHR.responseText);
                    }
                    });
                };
            });
        });

        //employee edit
        $(document).on("click", ".edit", function(){

            var id = $(this).attr('data');

            var awb = $(this).attr('aWb');
            var name = $(this).attr('names');
            var referenceNumbers = $(this).attr('referenceNumbers');
            var crm_description = $(this).attr('crm_description');

            $("#hid").val(id);
            $("#ref_no").val(referenceNumbers);
            $("#c_name").val(name);
            $("#awb").val(awb);
            $("#crm_description").val(crm_description);

            // empty_form();
            // $("#hid").val(id);
            $("#modal").modal('show');
            $(".modal-title").html('Credit Note');
            $("#submit").html('Credit Note');

            // $.ajax({
            //     'type': 'ajax',
            //     'dataType': 'json',
            //     'method': 'get',
            //     'url': 'employee/',
            //     'async': false,
            //     success: function(data){
            //         $("#first_name").val(data.first_name);
            //         $("#last_name").val(data.last_name);
            //         $("#company").val(data.company);
            //         $("#employee_email").val(data.email);
            //         $("#phone_no").val(data.phone_no);
            //     }
            // });
            //user button click submit data to controller
            $("#submit").click(function(){

                // if($("#hid").val() != ""){
                // var id =$("#hid").val();

                var referenceNumber = $("#ref_no").val();
                var c_name = $("#c_name").val();
                var credit_amount = $("#credit_amount").val();
                var invoice_no = $("#invoice_no").val();
                var awb = $("#awb").val();
                var calculation = $("#calculation").val();
                var crm_description = $("#crm_description").val();
                var crm_id = $("#hid").val();
                var description = $("#description").val();
                console.log(description);
                var assign_user = $("#add_assign_user").val();


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
                            add_email_send();
                            $.ajax({
                                'type': 'ajax',
                                'dataType': 'json',
                                'method': 'post',
                                'data' : {referenceNumber:referenceNumber,c_name:c_name,invoice_no:invoice_no,awb:awb,calculation:calculation,credit_amount:credit_amount,crm_description:crm_description,crm_id:crm_id,description:description,assign_user:assign_user},
                                'url': '/complain',
                                'async': false,
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
                        "dataSrc": 'list',
                        'url': '/complain/esm'
                    },
            'columns': [
                {data: "name"},
                {data: "aWB"},
                {data: "assignedUserName"},
                {
                    data: null,
                    render: function(d){
                        var html = "";
                        html+="<td><button class='btn btn-warning btn-sm edit' data='"+d.id+"' aWB='"+d.aWB+"' names='"+d.name+"' referenceNumbers='"+d.referenceNumber+"' crm_description='"+d.description+"' title='Edit'><i class='fas fa-edit' ></i></button>";
                        return html;

                    }

                }
            ]
        });
    }

    function email_send(){
        var id =$("#assign_user").val();

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
    