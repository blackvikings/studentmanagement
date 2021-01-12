<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\StudentClass;

/**
 * Class StudentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StudentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Student::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/student');
        CRUD::setEntityNameStrings('student', 'students');

        $this->crud->addButtonFromView('line', 'promote', 'promote', 'end');
        $this->crud->addButtonFromView('line', 'generate', 'generate', 'end');
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
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'dateOfBirth',
            'type' => 'date_picker',
            'label' => 'Date of birth',
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy',
                'language' => 'en'
            ]
        ]);

        $this->crud->addColumn([   // select_from_array
            'name'        => 'gender',
            'label'       => "Gender",
            'type'        => 'select_from_array',
            'options'     => ['male' => 'Male', 'female' => 'Female'],
            'allows_null' => false,
            'default'     => 'male',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        $this->crud->addColumn([
            'name' => 'mobileNumber',
            'label' => 'Mobile Number',
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'textarea'
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
        CRUD::setValidation(StudentRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'dateOfBirth',
            'type' => 'date_picker',
            'label' => 'Date of birth',
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy',
                'language' => 'en'
            ]
        ]);

        $this->crud->addField([
            'name' => 'email',
            'label' => 'E-mail address',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'mobileNumber',
            'label' => 'Mobile Number',
            'type' => 'text'
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
            'name' => 'motherName',
            'label' => 'Mother name',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'fatherName',
            'label' => 'Father name',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'fatherName',
            'label' => 'Father name',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'parentsMobileNumber',
            'label' => 'Parents mobile number',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'pincode',
            'label' => 'Pincode',
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name' => 'state',
            'label' => 'State',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'type' => 'relationship',
            'name' => 'studentClasses'
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

    public function promote($id)
    {
        $student = Student::where('id', $id)->first();
        $class = StudentClass::where('id','>' , $student->classId)->first();
        if(empty($class))
        {
            return redirect()->back()->with('message', 'Student already promoted for next class');
        }

        Student::where('id', $id)->update(['classId' => $class->id]);
        return redirect()->back()->with('message', 'Student promoted for next class');
    }


    public function generate($id)
    {
        $student = Student::where('id', $id)->first();

        $studentId = (!empty($student->studentId) || $student->studentId != null || $student->studentId != '' ? $student->studentId+1 : 20000+1 );
        Student::where('id', $id)->update(['studentId' => $studentId]);

        return view('card.card', compact('student'));
    }
}
