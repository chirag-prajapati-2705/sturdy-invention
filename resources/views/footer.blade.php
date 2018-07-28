<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/27/2017
 * Time: 10:11 PM
 */
?>
<!--footer-->
<div class="footer">
    {{--  <div class="container">
          <div class="footer-top">
              <div class="col-md-8 top-footer">
                  <iframe src="//www.google.com/maps/embed/v1/place?q=55/8,Mukhivas,Jahangirpura,Opp.New Civil Hospital,Ahmedabad,Gujarat
        &zoom=17
        &key=YOUR_API_KEY">
                  </iframe>
              </div>
              <div class="col-md-4 top-footer1">
                  <h2>Newsletter</h2>

                  <form>
                      <input type="text" value="" onfocus="this.value='';"
                             onblur="if (this.value == '') {this.value ='';}">
                      <input type="submit" value="SUBSCRIBE">
                  </form>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>--}}
    <div class="footer-bottom">
        <div class="container">
            <div class="col-sm-3 footer-bottom-cate">
                <h6>Categories</h6>
                <ul>
                    @foreach($categories as $category)
                        <li><a href="#">{{$category->category_name}}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-sm-3 footer-bottom-cate">
                <h6>Feature Projects</h6>
                <ul>
                    <li><a href="#">Curabitur sapien</a></li>
                    <li><a href="#">Dignissim purus</a></li>
                    <li><a href="#">Tempus pretium</a></li>
                    <li><a href="#">Dignissim neque</a></li>
                    <li><a href="#">Ornared id aliquet</a></li>

                </ul>
            </div>
            <div class="col-sm-3 footer-bottom-cate">
                <h6>Top Brands</h6>
                <ul>
                    <li><a href="#">Curabitur sapien</a></li>
                    <li><a href="#">Dignissim purus</a></li>
                    <li><a href="#">Tempus pretium</a></li>
                    <li><a href="#">Dignissim neque</a></li>
                    <li><a href="#">Ornared id aliquet</a></li>
                    <li><a href="#">Ultrices id du</a></li>
                    <li><a href="#">Commodo sit</a></li>

                </ul>
            </div>
            <div class="col-sm-3 footer-bottom-cate cate-bottom">
                <h6>Our Address</h6>
                <ul>
                    <li>{{ADDRESS}} </li>
                    <li class="phone">PH : {{CONTACT_NUMBER}} </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <p class="footer-class"> © 2017 All Rights Reserved | Design by <a href=""
                                                                               target="_blank"><?php echo DESIGNED_BY;?></a>
            </p>
        </div>
    </div>
</div>

<!--//footer-->
</body>
</html>