<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Discount
 * @package App\Models
 * @version March 15, 2022, 11:07 am UTC
 *
 * @property string $name
 * @property string $description
 * @property integer $proc
 */
class Discount extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'discounts';


//    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'proc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'proc' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'proc' => 'required'
    ];


    public function products() {
        return $this->hasMany(Product::class);
    }

}
