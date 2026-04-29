<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'nama_product',
        'stok',
        'harga',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
