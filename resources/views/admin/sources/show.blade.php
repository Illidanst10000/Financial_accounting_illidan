@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sources</h1>
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
                <div class="row d-flex flex-column">
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.sources.create')}}" class="btn btn-block btn-success">Create Source</a>
                    </div>
                    <div class="card w-25 ml-2">

                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sources as $source)
                                    <tr>
                                        <td>{{$source->id}}</td>
                                        <td>{{$source->title}}</td>
                                        <td><a href=""><i class="far fa-eye"></i></a></td>
                                        <td><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                        <td><a href=""><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.row -->




            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
