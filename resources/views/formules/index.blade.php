






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

                    @foreach ($formules as $formule)


        <div class="card mb-3" style="max-width: 700px;" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{$formule->imgPath}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                 <h1 class="card-title"> <a href ="#">{{$formule->nomFormule}} </a></h1>
                 <p class="card-text"> <h3>{{$formule->prix}}$ </h3> </p>
                 <p class="card-text"> {{$formule->description}} </p>
                
                <form action="{{route('cart.store')}}" method="POST">
                    @csrf
                <input type="hidden" name="id" value="{{$formule->id}}">
               <input type="hidden" name="nomFormule" value="{{$formule->nomFormule}}">
                <input type="hidden" name="prix" value="{{$formule->prix}}">

                <input type="hidden" name="imgPath" value="{{$formule->imgPath}}">

                
                
    
                      <button type="submit" class="btn btn-dark">Add to Panier </button>
                      
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach














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