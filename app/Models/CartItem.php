<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CartItem
 * @package App\Models
 * @version March 29, 2022, 4:20 pm UTC
 *
 * @property integer $cart_id
 * @property integer $product_id
 * @property integer $product_size_id
 * @property integer $product_meat_id
 * @property integer $product_sauce_id
 * @property string $paid_accessories
 * @property string $free_accessories
 * @property number $price_current
 * @property integer $count
 * @property string $size
 */
class CartItem extends Model
{

    use HasFactory;

    public $table = 'cart_items';


    public $fillable = [
        'cart_id',
        'product_id',
        'product_size_id',
        'product_meat_id',
        'product_sauce_id',
        'paid_accessories',
        'free_accessories',
        'price_current',
        'count',
        'size',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cart_id' => 'integer',
        'product_id' => 'integer',
        'product_size_id' => 'integer',
        'product_meat_id' => 'integer',
        'product_sauce_id' => 'integer',
        'paid_accessories' => 'string',
        'free_accessories' => 'string',
        'price_current' => 'double',
        'count' => 'integer',
        'size' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cart_id' => 'required',
        'product_id' => 'required',
        'price_current' => 'required|min:5',
        'count' => 'required'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function itemSize()
    {
        return $this->hasOne(ProductSize::class, 'id', 'product_size_id');
    }

    public function meat()
    {
        return $this->hasOne(ProductMeat::class, 'id', 'product_meat_id');
    }

    public function sauce()
    {
        return $this->hasOne(ProductSauce::class, 'id', 'product_sauce_id');
    }
}
