<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Fuel extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
    ];

    public function techdatas(): BelongsToMany 
    {
        return $this->belongsToMany(TechData::class, 'techdatas_fuels', 'fuel_id', 'techd_id');

    }
}
