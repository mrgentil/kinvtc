<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationAeroport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicule_id',
        'dropoffLocation',
        'cout_total',
        'pickUpDate',
        'pickUpTime',
        'collection_date',
        'collection_time',
        'commune_id',
        'statut',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicule() {
        return $this->belongsTo(Aeroport::class, 'vehicule_id');
    }

    public function commune() {
        return $this->belongsTo(Commune::class, 'commune_id');
    }
}
