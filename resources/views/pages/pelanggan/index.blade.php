@extends('layouts.master')

@section('link')
    @include('layouts.script.datatable.datatable_link')
    @include('layouts.script.alert.alert_link')
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
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <h3 class="card-title col">List Pelanggan</h3>
                                    <a class="btn btn-primary col-xs" href="/pelanggan/formaddcustomer">Add Pelanggan</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Info Pelanggan</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $no = 1;
                                    ?>
                                    <tbody>
                                        @foreach ($customers as $cus)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <b>Name : </b>{{ $cus->customer_name }} <br>
                                                <b>Phone : </b>{{ $cus->phone ? $cus->phone : '-' }} <br>
                                                <b>Address : </b>{{ $cus->address }}
                                            </td>
                                            <td>{{ $cus->email }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('editCutomerForm', $cus->id) }}" class="btn btn-success mr-1">Edit</a>
                                                <form action="{{ route('deleteCustomerProcess', $cus->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Info Pelanggan</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
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
    @include('layouts.script.datatable.datatable_script')

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
@endsection