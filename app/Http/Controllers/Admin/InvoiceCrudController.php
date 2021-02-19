<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InvoiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InvoiceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Invoice::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/invoice');
        CRUD::setEntityNameStrings('invoice', 'invoices');

//        $this->crud->addButtonFromView('line', 'payment', 'payment', 'end');

//        $this->crud->addButtonFromView('line', 'invoice', 'invoice', 'end');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
//        CRUD::setFromDb(); // columns

        $this->crud->addColumn([
            'type' => 'relationship',
            'name' => 'medical'
        ]);

        $this->crud->addField([
            'name' => 'amount',
            'type' => 'number',
            'label' => 'Amount'
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
        CRUD::setValidation(InvoiceRequest::class);

//        CRUD::setFromDb(); // fields

        $this->crud->addField([
            'type' => 'relationship',
            'name' => 'medical'
        ]);

        $this->crud->addField([
            'name' => 'heading',
            'type' => 'select_from_array',
            'options'     => ['PRANAB PATHOLOGICAL LABORATORY' => 'PRANAB PATHOLOGICAL LABORATORY', 'PRANAB CLINIC' => 'PRANAB CLINIC'],
            'allows_null' => false,
            'default'     => 'PRANAB PATHOLOGICAL LABORATORY'
        ]);

        $this->crud->addField([
            'name' => 'amount',
            'type' => 'number',
            'label' => 'Amount'
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
        Invoice::where('id', $id)->update(['paymentStatus' => 'paid', 'paymentDate' => date('Y-m-d')]);

        $fee = Invoice::where('id', $id)->with(['medical' => function($query){
            $query->with('checkup');
        }])->first();
        return view('invoice.invoice', compact('fee'));
    }

    public function invoice($id)
    {
        $fee = Invoice::where('id', $id)->with(['medical' => function($query){
            $query->with('checkup');
        }])->first();
        return view('invoice.invoice', compact('fee'));
    }
}
