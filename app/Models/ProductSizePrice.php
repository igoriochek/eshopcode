<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizePrice extends Model
{
    use HasFactory;

    public $table = 'product_sizes_prices';

    protected $fillable = [
        'product_id',
        'product_size_id',
        'price'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'product_size_id' => 'integer',
        'price' => 'double'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function size()
    {
        return $this->hasOne(ProductSize::class, 'id', 'product_size_id');
    }
}
