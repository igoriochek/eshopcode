<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ratings
 * @package App\Models
 * @version April 17, 2022, 8:43 am UTC
 *
 * @property integer $value
 */
class Ratings extends Model
{

    use HasFactory;

    public $table = 'ratings';




    public $fillable = [
        'value',
        'user_id',
        'product_id',
        'description',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'value' => 'required'
    ];


}
