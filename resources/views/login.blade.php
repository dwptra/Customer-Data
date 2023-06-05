@extends('layouts.login_layout')

@section('title', 'Login')

@section('link')
    @include('layouts.script.alert.alert_link')
@endsection

@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1>Sign In</h1>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Input your account</p>

            <form id="quickForm" action="{{ route('loginProcess') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </form>

            <!-- /.social-auth-links -->
            <p class="mb-0">
                <a href="/register" class="text-center">Register a new account</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection

@section('script')
    {{-- Alert --}}
    @include('layouts.script.alert.alert_script')
    <script>
        $(function () {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
    
            @if(session('success'))
                Toast.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}'
                });
            @endif

            @if(session('fail'))
                Toast.fire({
                    icon: 'warning',
                    title: 'Fail',
                    text: '{{ session('fail') }}'
                });
            @endif
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

    {{-- Validation JS --}}
    <!-- Page specific script -->
    <script>
    $(function () {
        $('#quickForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
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
@endsection