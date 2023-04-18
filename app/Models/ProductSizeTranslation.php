<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeTranslation extends Model
{
    use HasFactory;

    public $table = 'product_sizes_translations';

    public $timestamps = false;

    protected $fillable = ['name'];
}
