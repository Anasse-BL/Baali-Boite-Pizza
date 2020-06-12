<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommandeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommandeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommandeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commande');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commande');
        $this->crud->setEntityNameStrings('commande', 'commandes');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $f1 = [
            
            'name' => 'date',
            'type' => 'timestamp',
            'label' => 'Date de commande'
            
        ];
        $f2 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'Adresse Liv',
        ];
       
        $f3 = [
            'name' => 'produit.nom',
            'type' => 'text',
            'label' => 'Liste produits'
        ];

        $f4 = [
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Liste clients'
        ];
        $this->crud->addColumns([$f4, $f3, $f2, $f1]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommandeRequest::class);
        $this->crud->addField([  // Select
            'label' => "Liste produits",
            'type' => 'select',
            'name' => 'produit_id', 
            'entity' => 'produit', 
            'attribute' => 'nom', 
        ]);

        $this->crud->addField([  // Select
            'label' => "Liste clients",
            'type' => 'select',
            'name' => 'client_id', 
            'entity' => 'client', 
            'attribute' => 'nom', 
        ]);

        
       
        $this->crud->addField([
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'Adresse Liv',


        ]);
        // TODO: remove setFromDb() and manually define Fields
        
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
