@extends('layout')


@section('content')
<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay">
  <h3>Hello Pizza Lovers</h3>
</div>
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="best_burgers_area">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section_title text-center mb-80">
                  <span> BREAKING FOOD WE SERVE THE BEST</span>
                  <div class="main-menu  d-none d-lg-block">
                      <nav>
                  
                  <li><a href="#"><h3>Mon Panier</h3> <i class="ti-angle-down"></i></a>
                    
              
          </div>
      </nav>
                  
              </div>
             
          </div>
      </div>

@if (Cart::count()>0)


<div class="px-4 px-lg-0">
    
  
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
  
            <!-- Shopping cart table -->
            <div class="table-responsive">
           <!--   <div class="room_heading_inner">-->
             <center>
              <a href="#" class="boxed-btn3">Vider le panier</a><br><br>
             </center>
            <!--  </div>-->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Produit</div>
                    </th>

                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Nom</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Prix </div>
                    </th>
                    
                  <!--  <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Prix final</div>
                    </th>-->
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Remove</div>
                    </th>
                   
                  </tr>
                </thead>
                <tbody>

                  @foreach(Cart::content() as $produit)
                  <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                      <img src="{{$produit->model->imgPath}}">
                      <!--
                        <div class="ml-3 d-inline-block align-middle">
                        <h2 class="mb-0"> <a href="{{ route('produits.index')}}" class="text-dark d-inline-block align-middle">{{$produit->model->nom}}</a></h2><span class="text-muted font-weight-normal font-italic d-block"></span>
                        </div>
                      -->
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>{{$produit->model->nom}}</strong></td>
                    <td class="border-0 align-middle"><strong>{{$produit->model->prix}}$</strong></td>
                   <!-- <td class="border-0 align-middle"><strong>{{$produit->model->remise}}%</strong></td>-->
        <!--      <td class="border-0 align-middle"><strong>{{number_Format($produit->model->prix-($produit->model->prix * $produit->model->remise)/100)}}$</strong></td> -->
           <!--   <td class="border-0 align-middle"><strong>{{$produit->model->getPrice()}}$</strong></td>-->
                   

                    <td class="border-0 align-middle">
                    <form action="{{route('cart.destroy',$produit->rowId)}}" method="POST">
                      @csrf 
                      @method('DELETE')
                    <button type="submit" class="text-dark"><i class="fa fa-trash"></i></a>

                    </form>

                   
                  </tr>
                 
                 
                  @endforeach
                  
                   
                </tbody>
                
              </table>
              
             
            <!-- <a  class="btn btn-dark rounded-pill py-2 btn-block">Total = {{number_Format($produit->model->prix-($produit->model->prix * $produit->model->remise)/100)+($produit->model->prix-($produit->model->prix * $produit->model->remise)/100)}}  </a> -->
           

            <div class="col-lg-14">
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détail de la commande</div>
              <div class="p-4">
                <p class="font-italic mb-4">Régler votre commande</p>
                <ul class="list-unstyled mb-4">
                  <li class="d-flex justify-content-between py-3 border-bottom">
                    
                  <strong class="text-muted">Sous-Total</strong>
                  
                  <strong>{{getPrice(Cart::subtotal())}}$</strong></li>
                
                <!-- <li class="d-flex justify-content-between py-3 border-bottom">
                   <strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>-->
                  <li class="d-flex justify-content-between py-3 border-bottom">
                  <strong class="text-muted">Tax</strong><strong>{{getPrice(Cart::tax())}}</strong></li>
                  <li class="d-flex justify-content-between py-3 border-bottom">
                    <strong class="text-muted">Total</strong>
                    <strong>{{getPrice(Cart::total())}}</strong></li>
                </ul>
              </div>
            </div>

            </div>
            

            <a href="{{route('paiement.index')}}" class="btn btn-dark rounded-pill py-2 btn-block">Passer à la caisse</a> 














           
            <!-- End -->
       
            @else 
            
            <h1 style="color:red;"> Votre Panier est vide </h1>

            <div class="px-4 px-lg-0">
    
  
              <div class="pb-5">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            
                      <!-- Shopping cart table -->
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Produit</div>
                              </th>
                              <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Prix</div>
                              </th>
                              <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Remise</div>
                              </th>
                              <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Remove</div>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @endif


                            

 
    
@endsection
                          