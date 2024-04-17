<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class TechData extends Model
{
    protected $table = 'tech_datas';
    use HasFactory;
    protected $fillable = [
        'year',
        'state_id',
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
    public function state(): HasOne
    {
        return $this->hasOne(State::class);
    }
    public function fuel(): BelongsToMany
    {
        return $this->belongsToMany(Fuel::class, 'techdatas_fuels', 'techd_id', 'fuel_id');
    }

}
