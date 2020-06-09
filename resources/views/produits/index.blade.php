@extends('layout')

@section('content')

 <!-- bradcam_area_start -->
 <div class="bradcam_area breadcam_bg overlay">
    <h3>Hello Pizza Lovers</h3>
</div>
<!-- bradcam_area_end -->
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<!-- best_burgers_area_start  -->

<div class="best_burgers_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-80">
                    <span> BREAKING FOOD WE SERVE THE BEST</span>
                    <div class="main-menu  d-none d-lg-block">
                        <nav>
                  <!--  <ul id="navigation">-->
                    <li><a href="#"><h3>Menu</h3> <i class="ti-angle-down"></i></a>
                     <!-- <ul class="list-group-item list-group-horizontal ">-->
                      <!--  <li class="list-group-item "> <a href="{{ route('catproduits.index')}}"><h2>Categories</h2></li>
                        <li class="list-group-item"><a href="{{ route('produits.index')}}"><h2>Products<h2></a></li>
                          <li class="list-group-item"> <a href="{{route('cart.index')}}"><h2>Mon Panier <span class="badge badge-light"></span>{{Cart::count()}}<h2></a></li> -->
                          
                      </ul>
                </ul>
            </div>
        </nav>
                    
                </div>
               
            </div>
        </div>
        @foreach ($produits as $produit)


        <div class="card mb-3" style="max-width: 700px;" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{$produit->imgPath}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                 <h1 class="card-title"> <a href ="{{ route('produits.show', $produit->id) }}">{{$produit->nom}} </a></h1>
                  <p class="card-text"> <h3><del>{{$produit->prix}}$ </h3></del> </p>
                  <p class="card-text"> <h3>{{$produit->getPrice()}}$ Avec une remise de {{$produit->remise}}%</h3> </p>
             
                <!--  <p class="card-text"> <h3><del>{{$produit->prix}}$</h3></del> </p>
                  
                  <p class="card-text"> <h3> {{number_Format($produit->prix-($produit->prix * $produit->remise)/100)}}$ Remise de {{$produit->remise}}%</p></h3>-->
                  
                <form action="{{route('cart.store')}}" method="POST">
                    @csrf
                <input type="hidden" name="id" value="{{$produit->id}}">
               <input type="hidden" name="nom" value="{{$produit->nom}}">
                <input type="hidden" name="prix" value="{{$produit->prix}}">

                <input type="hidden" name="imgPath" value="{{$produit->imgPath}}">

                
                
    
                      <button type="submit" class="btn btn-dark">Add to Panier </button>
                      
                  </form>
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
                      <h3>Pizza Hut</h3>
                      <p>Great way to make your business appear trust <br> and relevant.</p>
                      <a href="{{ route('cart.index')}}" class="boxed-btn3">Order Now</a>
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
                      <h3>Pizza Hut</h3>
                      <p>Great way to make your business appear trust <br> and relevant.</p>
                      <a href="{{ route('cart.index')}}" class="boxed-btn3">Order Now</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



@endsection