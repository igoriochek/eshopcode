<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSauceTranslation extends Model
{
    use HasFactory;

    public $table = 'product_sauces_translations';

    public $timestamps = false;

    protected $fillable = ['name'];
}
