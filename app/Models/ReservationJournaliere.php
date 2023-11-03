<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationJournaliere extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vehicule_id',
        'pickup_location',
        'cout_total',
        'pick_up_date',
        'pick_up_time',
        'collection_date',
        'collection_time',
        'difference_en_jours',
        'statut',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicule() {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }

}
