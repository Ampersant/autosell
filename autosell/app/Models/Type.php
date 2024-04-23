<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
        'name',
    ];
    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
    public function forms(): HasMany
    {
        return $this->hasMany(Form::class);
    }
}
