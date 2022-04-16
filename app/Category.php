<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    const SINGULAR_NAME = 'Category';

    protected $fillable = [
        'name'
    ];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
