<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Auto extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'mark_id',
        'user_id',
        'model_id',
        'type_id',
        'tech_data_id',
        'auto_history_id',
    ];

    public function mark(): HasOne 
    {
        return $this->hasOne(Mark::class); 
    }
    public function user(): HasOne 
    {
        return $this->hasOne(User::class); 
    }
    public function markmodel(): HasOne 
    {
        return $this->hasOne(MarkModel::class); 
    }
    public function type(): HasOne 
    {
        return $this->hasOne(Type::class); 
    }
    public function techdata(): HasOne 
    {
        return $this->hasOne(TechData::class); 
    }
    public function autohistory(): HasOne 
    {
        return $this->hasOne(AutoHistory::class); 
    }
}
