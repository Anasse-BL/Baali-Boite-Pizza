<?php

namespace App\Http\Controllers;

use App\Order;
use DateTime;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Gloudemans\Shoppingcart\Facades\Cart ;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Arr;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Stripe::setApiKey('sk_test_HzrZlaHaHY59TMp0Ei6QNdyj00nf79gJkG');

        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()*100),
            'currency' => 'usd',
            // Verify your integration in this guide by including this parameter 
            'metadata' => ['integration_check' => 'accept_a_payment'],
          ]);


          $clientSecret = Arr::get($intent, 'client_secret');

        return view('paiement.index',[
            'clientSecret' => $clientSecret
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->json()->all();
        $order = new Order();
        $order->payment_intent_i=$data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())
        ->setTimestamp($data['paymentIntent']['created'])
        ->format('Y-m-d H:i:s');

        $produits = [];
        $i = 0;

        foreach(Cart::content() as $produit){
            $produits['produit_' . $i][]= $produit->nom;
            $produits['produit_' . $i][]= $produit->prix;
            $i++;
            
        }

        $order->produits = serialize($produits);
        $order->user_id = 15;
        $order->save();

        if($data['paymentIntent']['status']==='succeeded'){
            Cart::destroy();
            Session::flash('success','Votre commande a été traité avec succès');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        }else{

            return response()->json(['success' => 'Payment Intent Not Succeeded']); 

        

        }



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function thankyou()
    {
    return Session::has('success') ? view('paiement.thankyou') : redirect()->route('produits.index');
    }
}
