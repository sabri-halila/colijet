<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colis extends Model
{
    use HasFactory;
    protected $fillable = [

        'ville' => 'required|min:3',
        'aeroport_d' => 'required|min:3',
        'aeroport_a' => 'required|min:3',
        'date_heur_d' => 'required|min:3',
        'date_heur_a' => 'required|min:3',
        'nb_kg' => 'required',
        'prix_kg' => 'required',
        'ville','aeroport_d', 'aeroport_a','aeroport_d', 'date_heur_d','aeroport_a','date_heur_a', 'nb_kg','prix_kg', 'resistance'
    ];
    public function setAnnonceAttribute($value)
    {
        $this->attributes['resistance'] = json_encode($value);
    }

    public function getAnnonceAttribute($value)
    {
        return $this->attributes['resistance'] = json_decode($value);
    }

}
