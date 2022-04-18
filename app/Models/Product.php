<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\QueryBuilder\QueryBuilder;
use \Illuminate\Database\Eloquent\Builder;
/**
 * Class Product
 * @package App\Models
 * @version March 15, 2022, 5:41 pm UTC
 *
 * @property string $name
 * @property number $price
 * @property integer $count
 * @property string $description
 * @property string $image
 * @property string $video
 * @property integer $visible
 * @property integer $promotion_id
 * @property integer $discount_id
 */
class Product extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'products';




//    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'price',
        'count',
        'description',
        'image',
        'video',
        'visible',
        'promotion_id',
        'discount_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'price' => 'double',
        'count' => 'integer',
        'description' => 'string',
        'image' => 'string',
        'video' => 'string',
        'visible' => 'integer',
        'promotion_id' => 'integer',
        'discount_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'count' => 'required',
        'description' => 'required'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function scopePriceFrom(Builder $query, $price) : Builder
    {
        return $query->where('price', '>=', $price);
    }

    public function scopePriceTo(Builder $query, $price) : Builder
    {
        return $query->where('price', '<=', $price);
    }
    public function scopeNameLike(Builder $query, $name) : Builder
    {
        return $query->where('name', 'like', "%$name%");
    }


}
