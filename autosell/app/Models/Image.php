<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'auto_id',
        'name',
        'path',
        'size',
        'mime_type',
    ];
    use HasFactory;
}
