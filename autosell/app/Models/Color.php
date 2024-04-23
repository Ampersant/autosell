<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    public $timestamps = false; 
    protected $fillabel = [
        'name'
    ];
    use HasFactory;
    public function autos(): HasMany
    {
        return $this->HasMany(Auto::class);
    }
}
