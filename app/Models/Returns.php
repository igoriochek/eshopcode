<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Returns
 * @package App\Models
 * @version April 14, 2022, 7:50 am UTC
 *
 * @property integer $user_id
 * @property integer $admin_id
 * @property integer $order_id
 * @property string $code
 * @property string $text
 * @property integer $status_id
 */
class Returns extends Model
{

    use HasFactory;

    public $table = 'returns';




    public $fillable = [
        'user_id',
        'admin_id',
        'order_id',
        'code',
        'description',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'admin_id' => 'integer',
        'order_id' => 'integer',
        'code' => 'string',
        'description' => 'string',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'admin_id' => 'required',
        'order_id' => 'required',
        'code' => 'required',
        'status_id' => 'required'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }

    public function status()
    {
        return $this->hasOne(ReturnStatus::class, 'id', 'status_id');
    }

}
