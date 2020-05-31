@extends('layout')

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
                    <li><a href="{{ route('produits.index')}}"><h3>Paiement</h3> <i class="ti-angle-down"></i></a>
                      
            </div>
        </nav>
                    
                </div>
               
            </div>
        </div>


<div class="col-md-12"><h1>Page de Paiement</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="#" class="my-4">
                <div id="card-element">

                </div>

                <div id="card-errors" role="alert"></div>

                <button class="btn btn-success mt-4" id="submit">Procéder au paiment</button>
            </form>
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
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
        console.log(result.paymentIntent);
        
     
      }
    }
  });
});
</script> 

@endsection