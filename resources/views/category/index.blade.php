@extends('layouts.app')

@section('content')
    <!--content-->
    <div class="content">
        <div class="container">
            <div class="content-top">
                <div class="content-top1">
                    @foreach($products as $product)
                        <div class="col-md-3 col-md2">
                            <div class="col-md1 simpleCart_shelfItem">
                                <a href="{{URL::to($product->sku)}}">
                                    <img class="img-responsive"
                                         src="{{ URL::asset('uploads/'.$product->image->image_name)}}" alt=""/>
                                </a>
                                <h3><a href="{{URL::to($product->sku)}}">{{$product->name}}</a></h3>
                                <div class="price">
                                    <h5 class="item_price">${{$product->price}}</h5>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--//content-->
@endsection
