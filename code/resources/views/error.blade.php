@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" style="padding-top:250px;padding-right:250px">
                <!-- Main content -->
                <section class="content">
                  <div class="error-page">
                    <h2 class="headline text-danger"></h2>

                    <div class="error-content">
                      <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>

                      <p>
                        You haven't permission to access this page.
                        <a href="/home">return to Home</a>
                      </p>
                    </div>
                  </div>
                  <!-- /.error-page -->

                </section>
    </section>
    <!-- /.content -->
</div>

@endsection