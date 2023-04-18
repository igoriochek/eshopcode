<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSauce extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $table = 'product_sauces';

    public $translatedAttributes = ['name'];

    protected $fillable = [
        'color',
        'default'
    ];

    protected $casts = [
        'color' => 'string',
        'default' => 'boolean'
    ];
}
