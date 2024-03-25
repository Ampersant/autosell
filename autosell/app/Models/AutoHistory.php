<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AutoHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'mileage',
        'num_users',
        'last_tech_insp',
    ];

    public function autos(): HasMany 
    {
        return $this->hasMany(Auto::class); 
    }
}
