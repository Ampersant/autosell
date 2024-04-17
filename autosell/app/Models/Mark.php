<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type_id'
    ];
    public function autos(): HasMany 
    {
        return $this->hasMany(Auto::class); 
    }
    public function models(): HasMany 
    {
        return $this->hasMany(MarkModel::class); 
    }
    public function type(): HasOne
    {
        return $this->hasOne(Type::class);
    }
}
