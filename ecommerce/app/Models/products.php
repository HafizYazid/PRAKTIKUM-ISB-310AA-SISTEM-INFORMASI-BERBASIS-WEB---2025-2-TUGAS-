<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'id_product',
        'name',
        'description',
        'price',
        'stock'
    ];

    public function categories()
    {
        return $this->belongsToMany(categories::class, 'category_products', 'id_product', 'id_category');
    }
}
