<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/28/2017
 * Time: 10:25 PM
 */
?>
@extends('layouts.app')
@section('content')
<!--banner-->
<div class="banner">
    <div class="col-sm-3 banner-mat">
        <img class="img-responsive" src="{{ URL::asset('front/images/ba1.jpg')}}" alt="">
    </div>
    <div class="col-sm-6 matter-banner">
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    @if(!empty($banners))
                        @foreach($banners as $banner)
                            <li>
                                <img src="{{ URL::asset('uploads/'.$banner->image)}}" alt="">
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-3 banner-mat">
        <img class="img-responsive" src="{{ URL::asset('front/images/ba.jpg')}}" alt="">
    </div>
    <div class="clearfix"></div>
</div>
<!--//banner-->
@include("home.recent",['products'=>$products])
@stop
