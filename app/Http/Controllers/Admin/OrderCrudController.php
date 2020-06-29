<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('order', 'orders');
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
        'name' => 'payment_created_at',
        'type' => 'text',
        'label' => 'la date de commande',
    ];
    
    $f4 = [
        'name' => 'produits',
        'type' => 'text',
        'label' => 'Produits comandés',
    ];
    $f5 = [
        'name' => 'adressliv',
        'type' => 'text',
        'label' => 'Adresse Liv',
    ];
    $f6 = [
        'name' => 'telephone',
        'type' => 'text',
        'label' => 'Téléphone',
    ];
    $f7 = [
        'name' => 'ville',
        'type' => 'text',
        'label' => 'Ville',
    ];
    $f8 = [
        'name' => 'email',
        'type' => 'text',
        'label' => 'E-mail',
    ];
    $this->crud->addColumns([$f4, $f3,$f1,$f2,$f5,$f6,$f7,$f8]);
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


    $this->crud->addField([
        'name' => 'adressliv',
        'type' => 'text',
        'label' => 'Adresse Liv',
    ]);
    $this->crud->addField([
        'name' => 'telephone',
        'type' => 'text',
        'label' => 'Téléphone',
    ]);
    $this->crud->addField([
        'name' => 'ville',
        'type' => 'text',
        'label' => 'Ville',
    ]);
    $this->crud->addField([
        'name' => 'email',
        'type' => 'text',
        'label' => 'E-mail',
    ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
