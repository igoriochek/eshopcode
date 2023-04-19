<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidAccessoryTranslation extends Model
{
    use HasFactory;

    public $table = 'paid_accessories_translations';

    public $timestamps = false;

    protected $fillable = ['name'];
}
