<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $table = 'product_sizes';

    public $translatedAttributes = ['name'];

    protected $fillable = ['default'];

    protected $casts = ['default' => 'boolean'];
}
