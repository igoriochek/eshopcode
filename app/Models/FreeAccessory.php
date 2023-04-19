<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeAccessory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $table = 'free_accessories';

    public $translatedAttributes = ['name'];

    protected $fillable = ['product_id'];

    protected $casts = ['product_id' => 'integer'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
