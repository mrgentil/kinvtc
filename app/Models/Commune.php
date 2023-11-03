<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $table = 'communes';

    public function aeroport()
    {
        return $this->hasMany(Aeroport::class);
    }

}
