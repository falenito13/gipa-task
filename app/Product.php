<?php

namespace App;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
        'product_id'
    ];

    const SINGULAR_NAME = 'Product';

    protected $dispatchesEvents = [
        'created' => ProductObserver::class
    ];

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_product','product_id','category_id');
    }
}
