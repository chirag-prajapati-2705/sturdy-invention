@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Category</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    {{Form::open(array('url' => 'admin/category','files' => true)) }}
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                        <label>Name</label>
                        {{Form::input('text','category_name',Input::old('category_name'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                        <label>Url</label>
                        {{Form::input('text','url',Input::old('url'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label>Select Parent Category</label>
                        <?php
                        $categories[null] = 'Please Select';

                        ?>
                        {{Form::select('parent_category',$categories,'',['class'=>'form-control'])}}

                    </div>
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label>Description</label>
                        {{Form::textarea('description',Input::old('description'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        {{Form::select('status',array('1'=>'Active','2'=>'In Active'),'',['class'=>'form-control'])}}
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
