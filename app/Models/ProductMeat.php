<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMeat extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    const BEEF = 1;
    const CHICKEN = 2;

    public $table = 'product_meats';

    public $translatedAttributes = ['name'];
}
