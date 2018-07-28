@extends('admin.layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="panel-heading">
                    <h1>Create New User</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::model($user, array('method' => 'PATCH', 'route' => array('user.update', $user->id))) }}

                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name</label>
                                {{Form::input('text','name',Input::old('name'),['class'=>'form-control'])}}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email</label>
                                {{Form::input('text','email',Input::old('email'),['class'=>'form-control'])}}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-primary">Submit Button</button>
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
