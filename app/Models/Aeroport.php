<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @method void prepareToAttachMedia(Media $media, FileAdder $fileAdder)
 */
class Aeroport extends Model
{
    use HasFactory;

    protected $table = 'aeroports';
    protected $fillable = ['image_cover','name','kilometrage','price', 'exterior_color', 'interior_color', 'capacite_passagers', 'disponibilite', 'slug'];

    public function commune()
    {
        return $this->belongsTo(Commune::class,'commune_id');
    }


}
