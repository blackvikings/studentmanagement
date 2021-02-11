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

//        $this->crud->addColumn([
//            'type' => 'relationship',
//            'name' => 'category',
//            'label' => 'Category'
//        ]);

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
            'name' => 'feeType',
            'type' => 'select_from_array',
            'options'     => ['Medical bill' => 'Medical bill', 'Morning school bill' => 'Morning school bill', 'Day school bill' => 'Day school bill', 'Hostel and day school bill' => 'Hostel and day school bill'],
            'allows_null' => false,
            'default'     => 'Medical bill',
            'attributes' => [
                'id' => 'feeType',
            ]
        ]);

        $this->crud->addField([
            'name' => 'heading',
            'type' => 'select_from_array',
            'options'     => ['PRANAB CHHATRABAS & SWAMI PRANABANANDA SATABARSIKI VIDYAPITH' => 'PRANAB CHHATRABAS & SWAMI PRANABANANDA SATABARSIKI VIDYAPITH', 'PRANAB PATHA BHAVAN' => 'PRANAB PATHA BHAVAN', 'PRANAB PATHOLOGICAL LABORATORY' => 'PRANAB PATHOLOGICAL LABORATORY'],
            'allows_null' => false,
            'default'     => 'PRANAB CHHATRABAS & SWAMI PRANABANANDA SATABARSIKI VIDYAPITH'
        ]);

        $this->crud->addField([
            'name' => 'feeName',
            'type' => 'text',
            'label' => 'Fee Name',
            'attributes' => [
                'class' => 'medical form-control'
            ]
        ]);

        $this->crud->addField([
            'name' => 'peasant_name',
            'type' => 'text',
            'label' => 'Peasant name',
            'attributes' => [
                'class' => 'medical form-control'
            ]
        ]);

        $this->crud->addField([
            'name' => 'peasant_address',
            'type' => 'textarea',
            'label' => 'Peasant address',
            'attributes' => [
                'class' => 'medical form-control'
            ]
        ]);


        $this->crud->addField([
            'type' => 'relationship',
            'name' => 'category',
            'label' => 'Category',
            'attributes' => [
                'class' => 'school form-control'
            ]
        ]);

        $this->crud->addField([
            'name' => 'feeNumber',
            'type' => 'number',
            'label' => 'Installment Number',
            'attributes' => [
                'class' => 'school form-control'
            ]
        ]);

        $this->crud->addField([
            'name' => 'amount',
            'type' => 'text',
            'label' => 'Fee Amount',
            'attributes' => [
                'class' => 'medical form-control'
            ]
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
            'name' => 'students',
            'label' => 'Student',
            'attributes' => [
                'class' => 'school form-control'
            ]
        ]);

        $this->crud->addField([
            'name' => 'cast',
            'type' => 'text',
            'label' => 'Cast Name'
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

        $fee = Fee::where('id', $id)->with(['category' => function($query){
            $query->with('items');
        }])->with('students')->first();
        return view('invoice.invoice', compact('fee'));
    }

    public function invoice($id)
    {
        $fee = Fee::where('id', $id)->with(['category' => function($query){
            $query->with('items');
        }])->with('students')->first();
        return view('invoice.invoice', compact('fee'));
    }

    public function openGoogle($crud = false)
    {
        return '<a class="btn btn-xs btn-default" target="_blank" href="http://google.com?q='.urlencode($this->text).'" data-toggle="tooltip" title="Just a demo custom button."><i class="fa fa-search"></i> Google it</a>';
    }
}
