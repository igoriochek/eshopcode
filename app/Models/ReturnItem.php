<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ReturnItem
 * @package App\Models
 * @version April 14, 2022, 8:58 am UTC
 *
 * @property integer $order_id
 * @property integer $user_id
 * @property integer $return_id
 * @property integer $product_id
 * @property integer $product_size_id
 * @property integer $product_meat_id
 * @property integer $product_sauce_id
 * @property number $price_current
 * @property number $count
 * @property string $size
 */
class ReturnItem extends Model
{
    use HasFactory;

    public $table = 'return_items';

    public $fillable = [
        'order_id',
        'user_id',
        'return_id',
        'product_id',
        'product_size_id',
        'product_meat_id',
        'product_sauce_id',
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
        'user_id' => 'integer',
        'return_id' => 'integer',
        'product_id' => 'integer',
        'product_size_id' => 'integer',
        'product_meat_id' => 'integer',
        'product_sauce_id' => 'integer',
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
        'order_id' => 'required',
        'user_id' => 'required',
        'return_id' => 'required',
        'product_id' => 'required',
        'price_current' => 'required',
        'count' => 'required|min:1',
        'size' => 'nullable|string'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
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
