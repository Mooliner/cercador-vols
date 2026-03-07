<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avio extends Model
{
    protected $fillable = [
        'capacitat',
        'companyia_id',
    ];

    public function companyia()
    {
        return $this->belongsTo(Companyia::class);
    }

    public function vols()
    {
        return $this->hasMany(Vol::class);
    }
}
