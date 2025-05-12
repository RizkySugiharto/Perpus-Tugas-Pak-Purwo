<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'book_id',
        'employee_id',
        'student_id',
        'book_title',
        'employee_name',
        'student_name',
    ];

    public $timestamps = false;
}
