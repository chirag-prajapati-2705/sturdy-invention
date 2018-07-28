@extends('admin.layouts.app')
@section('content')
        <div class="container">
            <div class="row">
                <div class="panel-heading">
                    <h1>Create New Product</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::model($category, array('method' => 'PATCH', 'route' => array('admin.category.update', $category->category_id),'files' => true)) }}
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                                <label>Name</label>
                                {{Form::input('text','category_name',Input::old('category_name'),['class'=>'form-control'])}}
                                @if ($errors->has('category_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                <label>Url</label>
                                {{Form::input('text','url',Input::old('url'),['class'=>'form-control'])}}
                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                                @endif
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
