<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Image extends Model
{
    protected $fillable = [
        'auto_id',
        'name',
        'path',
        'p_path',
        'is_thumb',
        'thumb_path',
        'carousel_path',
        'size',
        'mime_type',
    ];
    use HasFactory;
    public function auto(): HasOne 
    {
        return $this->hasOne(Auto::class, 'id', 'auto_id'); 
    }
}
