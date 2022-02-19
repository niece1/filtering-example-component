<?php

namespace App\Filters\Book;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Filter;

class DifficultyFilter extends Filter
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'beginner' => 'beginner',
            'intermediate' => 'intermediate',
            'advanced' => 'advanced',
        ];
    }

    /**
     * Filter by book difficulty.
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

        return $builder->where('difficulty', $value);
    }
}
