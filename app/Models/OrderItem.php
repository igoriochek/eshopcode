<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderItem
 * @package App\Models
 * @version April 12, 2022, 11:53 am UTC
 *
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $product_size_id
 * @property integer $product_meat_id
 * @property integer $product_sauce_id
 * @property string $paid_accessories
 * @property string $free_accessories
 * @property number $price_current
 * @property number $count
 * @property string $size
 */
class OrderItem extends Model
{
    use HasFactory;

    public $table = 'order_items';

    public $fillable = [
        'order_id',
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
        'order_id' => 'integer',
        'product_id' => 'integer',
        'product_size_id' => 'integer',
        'product_meat_id' => 'integer',
        'product_sauce_id' => 'integer',
        'paid_accessories' => 'boolean',
        'free_accessories' => 'boolean',
        'price_current' => 'double',
        'count' => 'double',
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
        'product_id' => 'required',
        'price_current' => 'required|min:5',
        'count' => 'required|min:1',
        'size' => 'nullable|string'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function size()
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
