<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = ['name',
                            'dateOfBirth',
                            'email',
                            'mobileNumber',
                            'gender',
                            'motherName',
                            'fatherName',
                            'parentsMobileNumber',
                            'address',
                            'city',
                            'pincode',
                            'state',
                            'paymentStatus',
                            'classId'];


    public function studentClasses()
    {
        return $this->belongsTo(StudentClass::class, 'classId');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'studentId');
    }

    public function setStudentIDAttribute()
    {
        $this->attributes['studentId'] = rand(1000000000,9999999999);
    }


}
