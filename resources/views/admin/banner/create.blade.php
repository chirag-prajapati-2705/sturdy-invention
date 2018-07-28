@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading">
                <h1>Create Banner</h1>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        {{Form::open(array('url' => 'admin/banner','files' => true)) }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label>Image</label>
                            {{ Form::file('image') }}
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            {{Form::select('status',array('1'=>'Active','2'=>'InActive'),'',['class'=>'form-control'])}}
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Button</button>
                        <button type="reset" class="btn btn-primary">Reset Button</button>
                        {{Form::close()}}
                    </div>
                </div>
                <!-- /.row (nested) -->

                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection
