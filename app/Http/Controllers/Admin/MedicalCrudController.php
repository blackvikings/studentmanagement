<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MedicalRequest;
use App\Models\Fee;
use App\Models\Invoice;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MedicalCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MedicalCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Medical::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/medical');
        CRUD::setEntityNameStrings('medical', 'medicals');


    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MedicalRequest::class);

//        CRUD::setFromDb(); // fields

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'appoinment',
            'label' => 'Appoinment',
            'type' => 'datetime'
        ]);

        $this->crud->addField([   // select_from_array
            'name'        => 'gender',
            'label'       => "Gender",
            'type'        => 'select_from_array',
            'options'     => ['male' => 'Male', 'female' => 'Female'],
            'allows_null' => false,
            'default'     => 'male',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        $this->crud->addField([
            'name' => 'age',
            'label' => 'Age',
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'textarea',
        ]);

        $this->crud->addField([
            'name' => 'bloodGroup',
            'label' => 'Blood group',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'label' => "Prescription",
            'name' => "image",
            'type' => 'image',
        ]);

        $this->crud->addField([
            'label' => 'Check up',
            'name' => 'checkup',
            'type' => 'relationship',
        ]);

        $this->crud->addField([
            'name' => 'cast',
            'label' => 'Cast',
            'type' => 'select_from_array',
            'options'     => ['General' => 'General', 'ST' => 'ST', 'SC' => 'SC', 'OBC' => 'OBC', 'Other' => 'Other'],
            'allows_null' => false,
            'default'     => 'General',
        ]);

        $this->crud->addField([
            'name' => 'discount',
            'label' => 'Discount',
            'type' => 'number'
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


}
