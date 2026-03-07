<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aeroport extends Model
{
    protected $fillable = [
        'codiIATA',
        'nom',
        'ciutat',
        'pais',
    ];

    public function volsSortida()
    {

        return $this->hasMany(Vol::class, 'aeroport_origen_id');
    }

    public function volsArribada()
    {

        return $this->hasMany(Vol::class, 'aeroport_desti_id');
    }
}
