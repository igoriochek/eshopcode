<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Category
 * @package App\Models
 * @version March 15, 2022, 9:45 am UTC
 *
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 * @property integer $visible
 */
class Category extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'categories';


//    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'parent_id',
        'visible'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'parent_id' => 'integer',
        'visible' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];


}
