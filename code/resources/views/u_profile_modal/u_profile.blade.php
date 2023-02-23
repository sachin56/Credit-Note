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
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username"   name="username" placeholder="Enter Username" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email"  name="email" placeholder="Enter email" readonly>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-success submit" id="submit">Save changes</button>
            </div>
        </div>
        </div>
    </div>
@endsection    