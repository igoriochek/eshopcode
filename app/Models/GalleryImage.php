<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'filename',
        'original_filename',
        'mime_type',
        'size'
    ];
}
