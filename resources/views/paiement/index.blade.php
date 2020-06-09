@extends('layout')

@section('extra-meta')

<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection






@section('extra-script')

<script src="https://js.stripe.com/v3/"></script>

@endsection



@section('content')

<div class="bradcam_area breadcam_bg overlay">
    <h3>Hello Pizza Lovers</h3>
  </div>
  
  <div class="best_burgers_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-80">
                    <span> BREAKING FOOD WE SERVE THE BEST</span>
                    <div class="main-menu  d-none d-lg-block">
                        <nav>
                    <ul id="navigation">
                    <li><a href="#"><h3>Paiement</h3> <i class="ti-angle-down"></i></a>
                      
                    </div>
                        </nav>
                    
                </div>
               
            </div>
        
  
      <div class="container">
<div class="col-md-12"><h1>Régler votre paiement</h1>
    <div class="row">
        <div class="col-md-6">
        <form action="{{route('paiement.store')}}" method="POST" class="my-4" id="payment-form">
          @csrf
          <div id="card-element">

          </div>

                <div id="card-errors" role="alert"></div>

                <button class="btn btn-success mt-3" id="submit"  >Procéder au paiement ({{getPrice(Cart::total())}}$)</button>
            </form>
        </div>
    </div>
</div>
  

</div>
@endsection





@section('extra-js')
<script>

var stripe = Stripe('pk_test_1rz84sfg56bjRS72yF6W47m000SqGFuiOF');
var elements = stripe.elements();
var style = {
    base: {
      color: "#32325d",
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: "antialiased",
      fontSize: "16px",
      "::placeholder": {
        color: "#aab7c4"
      }
    },
    invalid: {
      color: "#fa755a",
      iconColor: "#fa755a"
    }
  };
  
var card = elements.create("card", { style: style });
card.mount("#card-element");
card.addEventListener('change', ({error}) => {
  const displayError = document.getElementById('card-errors');
  if (error) {
    displayError.classList.add('alert','alert-warning');
    displayError.textContent = error.message;
  } else {
    displayError.classList.remove('alert','alert-warning');
    displayError.textContent = '';
  }
});


var submitButton = document.getElementById('submit');

submitButton.addEventListener('click', function(ev) {
  ev.preventDefault();
  stripe.confirmCardPayment("{{$clientSecret}}", {
    payment_method: {
        card: card,
        billing_details: {
        name: 'Jenny Rosen'
      
      
      }
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        var paymentIntent = result.paymentIntent;
                var url = form.action;
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var redirect = '/merci';
                fetch(
                    url,
                    {
                        headers:{
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method : 'post',
                        body: JSON.stringify({
                            paymentIntent: paymentIntent
                        })
                    }
                ).then((data) => {
                    console.log(data);
                    window.location.href = redirect;
                }).catch((error) => {
                    console.log(error);
                })
      }
    }
  });
});
</script> 

@endsection


