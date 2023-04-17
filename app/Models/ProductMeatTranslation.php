<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMeatTranslation extends Model
{
    use HasFactory;

    public $table = 'product_meats_translations';

    public $timestamps = false;

    protected $fillable = ['name'];
}
