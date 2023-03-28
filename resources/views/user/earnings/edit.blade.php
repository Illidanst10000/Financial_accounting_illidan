@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Earnings</h1>
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
                            <h3 class="card-title">Update earning</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{route('user.earnings.update', $earning->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="text" class="form-control" placeholder="Enter amount" name="amount" value="{{$earning->amount}}">
                                    @error('title')
                                    <div class="text-danger mt-2">You have to fill this input</div>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <label>Date:</label>
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" value="{{$earning->date}}" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Source</label>
                                    <select class="form-control" name="source_id">
                                        @foreach($sources as $source)
                                            <option
                                                value="{{ $source->id }}" {{$source->id == $earning->source_id ? ' selected' : ''}}>{{ $source->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" name="type_id">
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{$type->id == $earning->type_id ? ' selected' : ''}}>{{ $type->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="text-bold">Decription</h6>
                                    <textarea name="description" id="summernote">{{$earning->description}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-3">
                                <input type="submit" class="btn btn-primary w-25" value="Add">
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
