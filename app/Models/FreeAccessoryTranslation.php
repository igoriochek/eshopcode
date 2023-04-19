<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeAccessoryTranslation extends Model
{
    use HasFactory;

    public $table = 'free_accessories_translations';

    public $timestamps = false;

    protected $fillable = ['name'];
}
