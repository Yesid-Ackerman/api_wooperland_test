<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Store extends Model
{
    protected $fillable = ['name'];
    protected $table = 'stores';

    // Relación uno a muchos con Articles
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_store');
    }

    // Scopes para inclusión de relaciones
    public function scopeIncluded(Builder $query)
    {
        if (empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect(['articles']); // Aquí puedes añadir más relaciones permitidas

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

    // Scope para filtrado de resultados
    public function scopeFilter(Builder $query)
    {
        if (empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect(['name']); // Aquí puedes añadir más campos permitidos para el filtrado

        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }

    // Scope para ordenamiento de resultados
    public function scopeSort(Builder $query)
    {
        if (empty(request('sort'))) {
            return;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect(['id', 'name']); // Aquí puedes añadir más campos permitidos para el ordenamiento

        foreach ($sortFields as $sortField) {
            $direction = 'asc';

            if (substr($sortField, 0, 1) == '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }
    }

    // Scope para paginación o recuperación de registros
    public function scopeGetOrPaginate(Builder $query)
    {
        if (request('perPage')) {
            $perPage = intval(request('perPage'));

            if ($perPage) {
                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }
}
