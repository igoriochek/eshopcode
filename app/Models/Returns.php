<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Returns
 * @package App\Models
 * @version April 14, 2022, 7:50 am UTC
 *
 * @property integer $user_id
 * @property integer $admin_id
 * @property integer $order_id
 * @property string $code
 * @property string $collect_time
 * @property integer $place
 * @property boolean $isCompanyBuying
 * @property string $text
 * @property integer $status_id
 */
class Returns extends Model
{
    use HasFactory;

    const ONTHESPOT = 1;
    const TAKEAWAY = 2;

    public $table = 'returns';

    public $fillable = [
        'user_id',
        'admin_id',
        'order_id',
        'code',
        'collect_time',
        'place',
        'isCompanyBuying',
        'description',
        'status_id',
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
        'admin_id' => 'integer',
        'order_id' => 'integer',
        'code' => 'string',
        'collect_time' => 'string',
        'place' => 'integer',
        'isCompanyBuying' => 'boolean',
        'description' => 'string',
        'status_id' => 'integer',
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
        'admin_id' => 'required',
        'order_id' => 'required',
        'code' => 'required',
        'status_id' => 'required',
        'isCompanyBuying' => 'required',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function status()
    {
        return $this->hasOne(ReturnStatus::class, 'id', 'status_id');
    }

    public function returnItems()
    {
        return $this->hasMany(ReturnItem::class, 'return_id', 'id');
    }

    public function scopeDateFrom(Builder $query, $date_from): Builder
    {
        return $query->where('created_at', '>=', Carbon::parse($date_from));
    }

    public function scopeDateTo(Builder $query, $date_to): Builder
    {
        return $query->where('created_at', '<=', Carbon::parse($date_to));
    }
}
