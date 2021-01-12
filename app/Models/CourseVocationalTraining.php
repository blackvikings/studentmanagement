<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class CourseVocationalTraining extends Model
{
    use CrudTrait;

    protected $table = 'course_vocational';

     protected $fillable = ['course_id', 'vocational_id'];
}
