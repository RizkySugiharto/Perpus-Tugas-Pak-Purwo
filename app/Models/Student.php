<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'nis',
        'name',
        'class',
        'address',
        'phone_number',
    ];

    public $timestamps = false;

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
