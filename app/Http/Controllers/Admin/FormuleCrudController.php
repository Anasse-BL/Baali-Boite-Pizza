<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters


        $champ1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '300px',
            'label'=> 'Image'
        ];

        $champ2 = [
            'name' => 'nomFormule',
            'type' => 'string',
            'label' => 'NomFormule'
        ];

        $champ3 = [
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description'
        ];

        $champ4 = [
            'name' => 'prix',
            'type' => 'float',
            'label' =>'Prix'
        ];



        $this->crud->addColumns([$champ1,$champ2, $champ4, $champ3]);
    }

    protected function setupCreateOperation()
    {

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
        $this->crud->setValidation(FormuleRequest::class);

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

        $champ1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '300px',
            'label'=> 'Image'
        ];

        $champ2 = [
            'name' => 'nomFormule',
            'type' => 'string',
            'label' => 'NomFormule'
        ];

        $champ3 = [
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description'
        ];

        $champ4 = [
            'name' => 'prix',
            'type' => 'float',
            'label' =>'Prix'
        ];



        $this->crud->addColumns([$champ1,$champ2, $champ4, $champ3]);
    }

}
