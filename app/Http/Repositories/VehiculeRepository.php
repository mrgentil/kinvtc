<?php

namespace App\Http\Repositories;

use App\Models\TypeVehicule;
use App\Models\Vehicule;

class VehiculeRepository
{
    public function getLatest(?int $limit = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Vehicule::query()
            ->with(['type'])
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getVehicule(string $slug): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $id = explode('-', $slug)[0];
        $slug = substr($slug, strpos($slug, explode('-', $slug)[1]));
        return Vehicule::query()
            ->with('type')
            ->where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function getTypes(): \Illuminate\Database\Eloquent\Collection|array
    {
        return TypeVehicule::query()->where('order', 1)->get();
    }

    private function getVehiculeIdFromSlug(string $slug): string
    {
        return $id = explode('-', $slug)[0];
    }


}
