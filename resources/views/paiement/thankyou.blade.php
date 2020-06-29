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
                    <span> MERCI</span>
<div class="col-md-12">
    <div class="jumbotron jumbotron-fluid change">
     <h1>   <span>Votre commande a été traitée avec succès</span></h1>
        
        <hr>
        
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ route('produits.index')}}" role="button">Continuer vers la page d'acceuil</a>
        
    </div>
</div>

@endsection