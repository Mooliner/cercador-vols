<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companyia extends Model
{
    // Es la part que deixem que l'usuari pugui modificar.
    protected $fillable = [
        'nom',
        'codi',
    ];

    // Relacions, al ser 1:N, fiquem el hasMany, si dos 1:1, ficariem hasOne.
    // I si fos N:1, seria belongsTo, is fos N:M, seria belongsToMany
    public function avions()
    {
        return $this->hasMany(Avio::class);
    }

    public function vols()
    {
        return $this->hasMany(Vol::class);
    }
}
