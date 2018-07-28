@extends('admin.layouts.app')

@section('content')
    <div id="tabs">
        <ul>
            <li><a href="#general">General</a></li>
            <li><a href="#category">Category</a></li>
        </ul>
        <div id="general">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        {{ Form::model($product, array('method' => 'PATCH', 'route' => array('product.update', $product->product_id),'files' => true)) }}
                        {{ csrf_field() }}
                        <input type="hidden" name="category_name" id="category_name" value="{{ implode(',',$product_category).',' }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Name</label>
                            {{Form::input('text','name',Input::old('name'),['class'=>'form-control'])}}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                            <label>Sku</label>
                            {{Form::input('text','sku',Input::old('sku'),['class'=>'form-control'])}}
                            @if ($errors->has('sku'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label>Image</label>
                            {{ Form::file('image') }}
                            @if(isset($product->image))

                                {{ Form::image('uploads/'.$product->image->image_name, null, ['class' => 'product-image'])}}
                                 {{Form::hidden('image_id',$product->image->id)}}
                            @endif
                            @if ($errors->has('image'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                            @endif
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
                <!-- /.row (nested) -->
                <!-- /.panel -->
            </div>
        </div>
        <div id="category">
            <div id="tree">
                @if(isset($categories))
                    @foreach ($categories as $key=>$category)
                        @if($category->parent_id==0)
                            <ul>

                                <?php
                                $checked="unchecked";
                                if (in_array($category->category_id, $product_category)) {
                                    $checked="checked";
                                }
                                ?>
                                <li data-checkstate="{{$checked}}" category="<?php echo $category->category_id;?>"
                                    id="folder_<?php echo ++$key;?>">{{ $category->category_name }}
                                    @endif
                                    @if(count($category->children) >0)
                                        @foreach ($category->children as $k=>$children)
                                            <?php
                                            $child_checked="unchecked";
                                            if (in_array($children->category_id, $product_category)) {
                                                $child_checked="checked";
                                            }
                                            ?>
                                            <ul>
                                                <li data-checkstate="{{$checked}}" category="<?php echo $children->category_id;?>"
                                                    id="child_<?php echo ++$k;?>">{{ $children->category_name }}</li>
                                            </ul>
                                        @endforeach
                                    @endif
                                </li>
                            </ul>
                            @endforeach
                        @endif
            </div>
        </div>

    </div>
    <div class="" style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Submit Button</button>
        <button type="reset" class="btn btn-primary">Reset Button</button>
    </div>
    {{Form::close()}}
@endsection
