<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MarkModel extends Model
{
    use HasFactory;
    protected $table = 'models';

    protected $fillable = [
        'mark_id',
        'name',
    ];

    public function marks(): HasMany 
    {
        return $this->hasMany(Mark::class);
    }
}
