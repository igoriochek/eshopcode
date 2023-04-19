<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidAccessory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $table = 'paid_accessories';

    public $translatedAttributes = ['name'];

    protected $fillable = ['price'];

    protected $casts = ['price' => 'float'];
}
