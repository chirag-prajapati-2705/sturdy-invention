@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading">
                <h1>Edit Banner</h1>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        {{ Form::model($banner, array('method' => 'PATCH', 'route' => array('admin.banner.update', $banner->banner_id),'files' => true)) }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label>Image</label>
                            {{ Form::file('image') }}
                            @if(isset($banner->image))
                                {{ Form::image('uploads/'.$banner->image, null, ['class' => 'banner-image'])}}
                                {{Form::hidden('image_id',$banner->banner_id)}}
                            @endif
                            @if ($errors->has('image'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            {{Form::select('status',array('1'=>'Active','2'=>'InActive'),'',['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
                <!-- /.row (nested) -->
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <div class="" style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Submit Button</button>
        <button type="reset" class="btn btn-primary">Reset Button</button>
    </div>
    {{Form::close()}}
@endsection
