<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

/**
 * Class Cart
 * @package App\Models
 * @version March 29, 2022, 4:14 pm UTC
 *
 * @property integer $user_id
 * @property string $code
 * @property string $collect_time
 * @property integer $place
 * @property boolean $isCompanyBuying
 * @property integer $status_id
 * @property integer $admin_id
 */
class Cart extends Model
{
    use HasFactory;

    const STATUS_ON = 1;
    const STATUS_OFF = 2;
    const ONTHESPOT = 1;
    const TAKEAWAY = 2;

    public $table = 'carts';

    public function scopeDateFrom(Builder $query, $date_from): Builder
    {
        return $query->where('created_at', '>=', Carbon::parse($date_from));
    }

    public function scopeDateTo(Builder $query, $date_to): Builder
    {
        return $query->where('created_at', '<=', Carbon::parse($date_to));
    }

    public $fillable = [
        'user_id',
        'code',
        'collect_time',
        'place',
        'isCompanyBuying',
        'phone_number',
        'sum',
        'status_id',
        'admin_id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'code' => 'string',
        'collect_time' => 'string',
        'place' => 'integer',
        'isCompanyBuying' => 'boolean',
        'phone_number' => 'string',
        'sum' => 'double',
        'status_id' => 'integer',
        'admin_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'code' => 'required',
        'status_id' => 'required',
        'place' => 'required',
        'isCompanyBuying' => 'required',
        'phone_number' => 'string'
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
        return $this->hasOne(CartStatus::class, 'id', 'status_id');
    }
}
