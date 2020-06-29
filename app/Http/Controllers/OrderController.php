<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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


    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
       // $this->crud->setFromDb();
       $f1 = [
        'name' => 'payment_intent_id',
        'type' => 'text',
        'label' => "Payment Id"
    ];

    $f2 = [
        'name' => 'amount',
        'type' => 'text',
        'label' => 'Total'
    ];

    $f3 = [
        'name' => 'created_at',
        'type' => 'text',
        'label' => 'la date de commande',
    ];
    
    $f4 = [
        'name' => 'produits',
        'type' => 'text',
        'label' => 'Produits comandés',
    ];
    $this->crud->addColumns([$f4, $f3,$f1,$f2]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(OrderRequest::class);

        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
       $this->crud->addField([
        'label' => "Date de Commande",
        'name' => 'payment_created_at',
        'type' => 'datetime',
        'default' => '2020/06/11'
    ]);

    $this->crud->addField([  // Select
        'label' => "Total",
        'type' => 'number',
        'name' => 'amount' 
    ]);
    
    $this->crud->addField([
        'label' => "Id payment",
        'name' => 'payment_intent_id',
        'type' => 'text'
    ]);

    $this->crud->addField([
        'label' => "Les produits",
        'name' => 'produits',
        'type' => 'text'
    ]);

    }
}
