<?php

namespace App\Models;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'cover_id',
        'title',
        'author',
        'publisher',
        'published_date',
        'description',
    ];

    public $timestamps = false;

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function casts(): array {
        return [
            'published_date' => 'date'
        ];
    }

    public function getCoverUrl(): string {
        $cloud = cloudinary()->configuration->cloud->cloudName;
        $publicId = $this->cover_id;

        return "https://res.cloudinary.com/$cloud/image/upload/$publicId";
    }
}
