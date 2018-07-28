@extends('layouts.app')

@section('content')

    {{--
    <div class="container">
        <div class="row">
            <p>{{$products->name}}</p>
            <p>{{$products->price}}</p>
            <p>{{ Html::image($products->image->getImagePath($products->image->image_name), 'img', ['class'=>'product-image']) }}</p>
            <p><input type="submit" name="payment" value="Payment"></p>
        </div>
    </div>--}}
    <div class="single">

        <div class="container">
            <div class="col-md-9">
                <div class="col-md-5 grid">
                    <div class="">
                        <div class="flex-viewport">
                            <ul class="slides">
                                <li class="clone"
                                    style="width: 304px; float: left; display: block;">
                                    <div class="thumb-image">
                                        {{ Html::image($products->image->getImagePath($products->image->image_name), 'img', ['class'=>'']) }}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 single-top-in">
                    <div class="single-para simpleCart_shelfItem">
                        <h1>{{$products->name}}</h1>

                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece
                            of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        <label class="add-to item_price">${{$products->price}}</label>
                        <a href="#" class="cart item_add">More details</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="content-top1">
                    <div class="col-md-4 col-md3">
                        <div class="col-md1 simpleCart_shelfItem">
                            <a href="single.html">
                                <img class="img-responsive" src="images/pi6.png" alt="">
                            </a>

                            <h3><a href="single.html">Jeans</a></h3>

                            <div class="price">
                                <h5 class="item_price">$300</h5>
                                <a href="#" class="item_add">Add To Cart</a>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-md3">
                        <div class="col-md1 simpleCart_shelfItem">
                            <a href="single.html">
                                <img class="img-responsive" src="images/pi7.png" alt="">
                            </a>

                            <h3><a href="single.html">Tops</a></h3>

                            <div class="price">
                                <h5 class="item_price">$300</h5>
                                <a href="#" class="item_add">Add To Cart</a>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-md3">
                        <div class="col-md1 simpleCart_shelfItem">
                            <a href="single.html">
                                <img class="img-responsive" src="images/pi.png" alt="">
                            </a>

                            <h3><a href="single.html">Tops</a></h3>

                            <div class="price">
                                <h5 class="item_price">$300</h5>
                                <a href="#" class="item_add">Add To Cart</a>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <!----->
            <div class="col-md-3 product-bottom">
                <!--categories-->
                <div class=" rsidebar span_1_of_left">
                    <h3 class="cate">Categories</h3>
                    <ul class="menu-drop">
                        <li class="item1"><a href="#">Men </a>
                            <ul class="cute" style="display: none;">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails </a></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="#">Women </a>
                            <ul class="cute" style="display: none;">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails </a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="#">Kids</a>
                            <ul class="cute" style="display: none;">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails</a></li>
                            </ul>
                        </li>
                        <li class="item4"><a href="#">Accesories</a>
                            <ul class="cute" style="display: none;">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails</a></li>
                            </ul>
                        </li>

                        <li class="item4"><a href="#">Shoes</a>
                            <ul class="cute" style="display: none;">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--initiate accordion-->
                <script type="text/javascript">
                    $(function () {
                        var menu_ul = $('.menu-drop > li > ul'),
                                menu_a = $('.menu-drop > li > a');
                        menu_ul.hide();
                        menu_a.click(function (e) {
                            e.preventDefault();
                            if (!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true, true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true, true).slideUp('normal');
                            }
                        });

                    });
                </script>
                <!--//menu-->

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@stop
