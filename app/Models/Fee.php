<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = ['feeName','feeNumber', 'amount', 'paymentStatus', 'studentId', 'heading', 'feeType', 'category_id', 'peasant_name', 'peasant_address', 'cast'];

    public function students()
    {
        return $this->belongsTo(Student::class, 'studentId');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_fee');
    }

}
