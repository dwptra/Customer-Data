@extends('layouts.master')

@section('link')
@include('layouts.script.datatable.datatable_link')
@endsection

@section('content')

<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset('assets/dist/img/logo.png') }}" alt="Data Pelanggan - Logo"
            height="60" width="60">
    </div>

    @include('layouts.components.navbar')
    @include('layouts.components.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pelanggan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/pelanggan">Pelanggan</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Horizontal Form -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Input Valid Data!</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" class="form-horizontal" action="{{ route('addCustomerProcess') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="customer_name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Save</button>
                            <a href="/pelanggan" class="btn btn-warning">Cancel</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{-- Footer --}}
    @include('layouts.components.footer')
</div>
<!-- /.content-wrapper -->

@endsection

@section('script')
    @include('layouts.script.validation.validation_script')
    {{-- Validation JS --}}
    <!-- Page specific script -->
    <script>
        $(function () {
            $('#quickForm').validate({
                rules: {
                    customer_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    address: {
                        required: true,
                        message: false,
                        minlength: 5
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    {{-- Any errors --}}
    @if($errors->any())
    <script>
        $(document).ready(function() {
            $.each(@json($errors->all()), function(key, value) {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Error',
                    body: value
                });
            });
        });
    </script>
    @endif
@endsection
