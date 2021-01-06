<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FeeRequest;
use App\Models\Fee;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FeeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FeeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Fee::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/fee');
        CRUD::setEntityNameStrings('fee', 'fees');

        $this->crud->addButtonFromView('line', 'payment', 'payment', 'end');
        $this->crud->addButtonFromView('line', 'invoice', 'invoice', 'end');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->addColumn([
            'name' => 'feeName',
            'type' => 'text',
            'label' => 'Fee Name'
        ]);

        $this->crud->addColumn([
            'name' => 'feeNumber',
            'type' => 'number',
            'label' => 'Installment No.'
        ]);

        $this->crud->addColumn([
            'name' => 'amount',
            'type' => 'number',
            'label' => 'Fee Amount'
        ]);

        $this->crud->addColumn([
            'type' => 'relationship',
            'name' => 'students',
            'label' => 'Student Name'
        ]);

        $this->crud->addColumn([
            'type' => 'relationship',
            'name' => 'students',
            'label' => 'Student Id'
        ]);

        $this->crud->addColumn([
            'type' => 'text',
            'name' => 'paymentStatus',
            'label' => 'Payment status'
        ]);
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
        CRUD::setValidation(FeeRequest::class);

        $this->crud->addField([
            'name' => 'feeName',
            'type' => 'text',
            'label' => 'Name'
        ]);

        $this->crud->addField([
            'name' => 'feeNumber',
            'type' => 'number',
            'label' => 'Installment Number'
        ]);

        $this->crud->addField([
            'name' => 'amount',
            'type' => 'text',
            'label' => 'Fee Amount'
        ]);

        $this->crud->addField([   // select_from_array
            'name'        => 'paymentStatus',
            'label'       => "Payment Status",
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'paid' => 'Paid'],
            'allows_null' => false,
            'default'     => 'pending',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        $this->crud->addField([
            'type' => 'relationship',
            'name' => 'students'
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

    public function payment($id)
    {
        Fee::where('id', $id)->update(['paymentStatus' => 'paid', 'paymentDate' => date('Y-m-d')]);

        $fee = Fee::where('id', $id)->first();
        return view('invoice.invoice', compact('fee'));
    }

    public function invoice($id)
    {
        $fee = Fee::where('id', $id)->first();
        return view('invoice.invoice', compact('fee'));
    }

}
