<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $fillable = [
        'data_sortida',
        'data_arribada',
        'preu',
        'companyia_id',
        'avio_id',
    ];

    public function companyia()
    {
        return $this->belongsTo(Companyia::class);
    }

    public function avio()
    {
        return $this->belongsTo(Avio::class);
    }

    public function origen()
    {
        return $this->belongsTo(Aeroport::class, 'aeroport_origen_id');
    }

    public function desti()
    {
        return $this->belongsTo(Aeroport::class, 'aeroport_desti_id');
    }
}
