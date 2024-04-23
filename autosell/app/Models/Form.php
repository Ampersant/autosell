<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Form extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
        'name',
        'type_id'
    ];

    public function type(): HasOne
    {
        return $this->hasOne(Type::class);
    }
}
