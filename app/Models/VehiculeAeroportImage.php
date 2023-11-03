<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculeAeroportImage extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'name']; // Ajoutez 'path' à la liste des colonnes fillable
}
