<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TechData extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'state',
        'consumption',
        'form_id',
        'transmission_id',
        'fuel_id',
    ];
    public function form(): HasOne
    {
        return $this->hasOne(Form::class);
    }
    public function transmission(): HasOne
    {
        return $this->hasOne(Transmission::class);
    }
    public function fuel(): HasOne
    {
        return $this->hasOne(Fuel::class);
    }
}
