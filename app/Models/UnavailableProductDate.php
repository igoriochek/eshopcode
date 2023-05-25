<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UnavailableProductDate extends Model
{
    use HasFactory;

    public $table = 'unavailable_product_dates';

    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'product_id',
        'unavailable_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'unavailable_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
