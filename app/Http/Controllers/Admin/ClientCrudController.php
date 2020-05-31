<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $champ1 = [
            'name' => 'nom',
            'type' => 'string',
            'label' => 'Nom',
        ];
        $champ2 = [
            'name' => 'prenom',
            'type' => 'string',
            'label'=> 'Prenom',

        ];
        $champ3 = [
            'name' => 'adresse',
            'type' =>'string',
            'label' =>'Adresse',
        ];
        $champ4 = [
            'name' => 'email',
            'type'=>'string',
            'label'=>'E-mail',
        ];
        $champ5 = [
            'name' => 'login',
            'type' => 'string',
            'label'=> 'Login',
        ];
        $champ6 = [
            'name' => 'motdepasse',
            'type' => 'string',
            'label'=> 'Mot de passe',
        ];
        $champ7 = [
            'name' => 'imgPath',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '300px',
            'label'=> 'Image',
        ];
        $champ8 = [
            'name' => 'created_at',
            'type' => 'datetime',
            'label' => 'Date inscr',
        ];
       
        $champ9 = [
            'name' => 'admin',
            'type' => 'string',
            'label'=> 'Admin',
        ];
       
        

        $this->crud->addColumns([$champ7,$champ1, $champ2, $champ3, $champ4, $champ5,$champ6,$champ8,$champ9]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);
        $this->crud->addField([
            'name' => 'motdepasse',
            'label' => 'Mot de passe',
            'type' => 'password'
            ]);

        $this->crud->addField([
            'label' => "Image",
            'name' => "imgPath",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'height' => '200px',
            'label' => 'Image'
        ];
        $f2 = [
            'name' => 'nom',
            'type' => 'string',
            'label' => 'Nom'
        ];
        $f3 = [
            'name' => 'prenom',
            'type' => 'string',
            'label' => 'Prenom',
        ];
        $f4 = [
            'name' => 'adresse',
            'type' => 'string',
            'label' => 'Adresse',
        ];
        $f5 = [
            'name' => 'email',
            'type' => 'string',
            'label' => 'E-mail',
        ];
        $f6 = [
            'name' => 'login',
            'type' => 'string',
            'label' => 'Login',
        ];
        $f7 = [
            'name' => 'motdepasse',
            'type' => 'text',
            'label' => 'Motdepasse',

        ];
        $f8 = [
            'name' => 'created_at',
            'type' => 'datetime',
            'label' => 'Date inscr',
        ];
        $f9 = [
            'name' => 'admin',
            'type' => 'boolean',
            'label' => 'Admin',
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8,$f9]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }
    public function store()
    {
        $this->crud->request = $this->crud->validateRequest();
        $this->crud->request = $this->handlePasswordInput($this->crud->request);
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitStore();
    }
    /**
     * Update the specified resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->crud->request = $this->crud->validateRequest();
        $this->crud->request = $this->handlePasswordInput($this->crud->request);
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }
    protected function handlePasswordInput($request)
    {
        // Remove fields not present on the user.
        // Encrypt password if specified.
        if ($request->input('motdepasse')) {
            $request->request->set('motdepasse', Hash::make($request->input('motdepasse')));
        } else {
            $request->request->remove('motdepasse');
        }
        return $request;
    }
}
