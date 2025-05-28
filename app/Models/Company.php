<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'vat',
        'address',
        'user_id',
    ];

    protected $casts = [
        'title' => 'string',
        'code' => 'string',
        'vat' => 'string',
        'address' => 'string',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
