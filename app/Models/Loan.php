<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'book_id',
        'user_id',
        'student_id',
        'book_title',
        'user_name',
        'student_name',
        'student_class',
    ];

    public $timestamps = false;
}
