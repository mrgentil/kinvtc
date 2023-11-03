<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Vehicule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $dates = ['created_at', 'updated_at'];

    public function getImageAttribute($image)
    {
        if (Str::startsWith($image, 'http://') || Str::startsWith($image, 'https://')) {
            return asset(Voyager::image($image));
        }
        return Voyager::image($image);
    }

    public function getSlugLinkAttribute(): string
    {
        $vehicule = $this;
        return route('cars.show', $vehicule->id . '-' . $this->slug);
    }

    public function getFormattedCreatedAtAttribute()
    {
        $originalLocale = App::getLocale();
        App::setLocale('fr');

        $formattedDate = Carbon::parse($this->attributes['created_at'])->format('F d, Y');

        App::setLocale($originalLocale);

        return $formattedDate;
    }

    public function type()
    {
        return $this->belongsTo(TypeVehicule::class,'type_vehicule_id');
    }


}
