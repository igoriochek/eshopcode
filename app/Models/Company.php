<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    public $table = 'companies';

    public $fillable = [
        'name',
        'address',
        'code',
        'vat_code',
        'order_id',
        'return_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'code' => 'string',
        'vat_code' => 'string',
        'order_id' => 'integer',
        'return_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static $rules = [
        'name' => 'required|string',
        'address' => 'required|string',
        'code' => 'required|string',
        'vat_code' => 'string',
        'order_id' => 'integer',
        'return_id' => 'integer'
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function return(): HasOne
    {
        return $this->hasOne(Returns::class, 'id', 'return_id');
    }
}
