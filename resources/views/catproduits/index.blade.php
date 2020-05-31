@extends('layout')

@section('content')

 <!-- bradcam_area_start -->
 <div class="bradcam_area breadcam_bg overlay">
    <h3>Hello Pizza Lovers</h3>
</div>
<!-- bradcam_area_end -->

<!-- best_burgers_area_start  -->
<div class="best_burgers_area">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section_title text-center mb-80">
                  <span> BREAKING FOOD WE SERVE THE BEST</span>
                  <div class="main-menu  d-none d-lg-block">
                      <nav>
                  <ul id="navigation">
                  <li><a href="#"><h3>Menu</h3> <i class="ti-angle-down"></i></a>
                    <ul class="list-group-item list-group-horizontal ">
                      <li class="list-group-item "> <a href="{{ route('catproduits.index')}}"><h2>Categories</h2></li>
                      <li class="list-group-item"><a href="{{ route('produits.index')}}"><h2>Products<h2></a></li>
                    </ul>
              </ul>
          </div>
      </nav>
                  
              </div>
             
          </div>
      </div>


        @foreach ($catproduits as $catproduit)


        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="images\rs.png" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h1 class="card-title">{{$catproduit->nomCat}}</h1>
                  
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        
    </div>
    
</div>


<!-- features_room_startt -->
<div class="Burger_President_area">
  <div class="Burger_President_here">
      <div class="single_Burger_President">
          <div class="room_thumb">
              <img src="images/hd.jpg" alt="">
              <div class="room_heading d-flex justify-content-between align-items-center">
                  <div class="room_heading_inner">
                      <span>$20</span>
                      <h3>The Burger President</h3>
                      <p>Great way to make your business appear trust <br> and relevant.</p>
                      <a href="#" class="boxed-btn3">Order Now</a>
                  </div>
                  
              </div>
          </div>
      </div>
      <div class="single_Burger_President">
          <div class="room_thumb">
              <img src="images/hd.jpg" alt="">
              <div class="room_heading d-flex justify-content-between align-items-center">
                  <div class="room_heading_inner">
                      <span>$20</span>
                      <h3>The Burger President</h3>
                      <p>Great way to make your business appear trust <br> and relevant.</p>
                      <a href="#" class="boxed-btn3">Order Now</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>





@endsection