<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Product extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Nama Tabel
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';

    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'stock',
        'image',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi ke Transaction
    |--------------------------------------------------------------------------
    */

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'product_id');
    }
}