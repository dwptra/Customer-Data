@extends('layouts.login_layout')

@section('title', 'Register')

@section('content')

<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1>Register</h1>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Input your data</p>

            <form id="quickForm" action="{{ route('registerProcess') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>

            <a href="/" class="text-center">I already have an account</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

@endsection

@section('script')

    {{-- Alert --}}
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
                name: {
                    required: true,
                },
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