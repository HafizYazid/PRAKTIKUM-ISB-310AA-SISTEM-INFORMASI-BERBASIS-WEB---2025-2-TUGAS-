<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'id_category',
        'name'
        ];

    public function products()
    {
        return $this->belongsToMany(products::class, 'category_products', 'id_category', 'id_product');
    }
}
