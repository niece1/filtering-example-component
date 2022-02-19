<?php

namespace App\Filters\Book;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class TypeFilter extends Filter
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'theory' => 'theory',
            'project' => 'project',
            'snippet' => 'snippet',
        ];
    }

    /**
     * Filter book by type.
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

        return $builder->where('type', $value);
    }
}
