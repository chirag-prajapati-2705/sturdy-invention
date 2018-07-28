@extends('admin.layouts.app')

@section('content')
    {{Form::open(array('url' => 'admin/product/store','files' => true)) }}
    {{ csrf_field() }}
    <div id="tabs">
        <ul>
            <li><a href="#general">General</a></li>
            <li><a href="#category">Category</a></li>
            {{--<li><a href="#tabs-3">Aenean lacinia</a></li>--}}
        </ul>

        <div id="general">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="hidden" name="category_name" id="category_name" value="">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Name</label>
                            {{Form::input('text','name',Input::old('name'),['class'=>'form-control'])}}
                        </div>
                        <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                            <label>Sku</label>
                            {{Form::input('text','sku',Input::old('sku'),['class'=>'form-control'])}}
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label>Image</label>
                            {{ Form::file('image') }}
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label>price</label>
                            {{Form::input('text','price',Input::old('price'),['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            {{Form::select('status',array('1'=>'Active','2'=>'InActive'),'',['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="category">
            <div id="tree">
                @foreach ($categories as $key=>$category)
                    @if($category->parent_id==0)
                        <ul>
                            <li category="<?php echo $category->category_id;?>"
                                id="folder_<?php echo ++$key;?>">{{ $category->category_name }}
                                @endif
                                @if(count($category->children) >0)
                                    @foreach ($category->children as $k=>$children)
                                        <ul>
                                            <li category="<?php echo $children->category_id;?>"
                                                id="child_<?php echo ++$k;?>">{{ $children->category_name }}</li>
                                        </ul>
                                    @endforeach
                                @endif
                            </li>
                        </ul>
                        @endforeach
            </div>
        </div>
    </div>
    <div class="" style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Submit Button</button>
        <button type="reset" class="btn btn-primary">Reset Button</button>
    </div>

    {{Form::close()}}
    </div>



@endsection
