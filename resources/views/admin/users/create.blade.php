@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="card card-primary col-4">
                        <div class="card-header mt-3">
                            <h3 class="card-title">Create user</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.users.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User name</label>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                                    @error('name')
                                    <div class="text-danger mt-2">You have to fill this input</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User email</label>
                                    <input type="text" class="form-control" placeholder="Enter email" name="email">
                                    @error('email')
                                    <div class="text-danger mt-2">You have to fill this input</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User password</label>
                                    <input type="text" class="form-control" placeholder="Enter password" name="password">
                                    @error('password')
                                    <div class="text-danger mt-2">You have to fill this input</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}" {{ $id == old('role_id' ? ' selected' : '') }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.row -->




            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
