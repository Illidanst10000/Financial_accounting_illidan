@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Spendings</h1>
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
                            <h3 class="card-title">Update spending</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('user.spendings.update', $spending->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="text" class="form-control" placeholder="Edit amount" name="amount"
                                           value="{{$spending->amount}}">
                                    @error('title')
                                    <div class="text-danger mt-2">You have to fill this input</div>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <label>Date:</label>
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" value="{{$spending->date}}" name="date"
                                               class="form-control datetimepicker-input"
                                               data-target="#datetimepicker1"/>
                                        <div class="input-group-append" data-target="#datetimepicker1"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{$category->id == $spending->category_id ? ' selected' : ''}}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="select2" name="tag_ids[]" multiple="multiple"
                                            data-placeholder="Select a Tag"
                                            style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option {{is_array( $spending->tags->pluck('id')->toArray()) && in_array($tag->id, $spending->tags->pluck('id')->toArray()) ? ' selected' : ''}} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" name="type_id">
                                        @foreach($types as $id => $type)
                                            <option
                                                value="{{ $id }}" {{$id == $spending->type_id ? ' selected' : ''}}>{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="text-bold">Decription</h6>
                                    <textarea name="description" id="summernote">{{$spending->description}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
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
