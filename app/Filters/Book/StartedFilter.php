<?php

namespace App\Filters\Book;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class StartedFilter extends Filter
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'true' => true,
            'false' => false,
        ];
    }

    /**
     * Filter book by started attribute.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder
     * @param mixed $value
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);
        if ($value === null) {
            return $builder;
        }
        $method = $value ? 'whereHas' : 'whereDoesntHave';

        return $builder->{$method}('users', function ($builder) {
            $builder->whereIn('users.id', [auth()->id()]);
        });
    }
}
