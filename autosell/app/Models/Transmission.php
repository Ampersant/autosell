<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transmission extends Model
{
    use HasFactory;
    protected $fillable = [
        'type'
    ];
    public function techdatas(): HasMany
    {
        return $this->hasMany(TechData::class);
    }
}
