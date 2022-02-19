<?php

namespace App\Filters\Book;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Filter;

/**
 * Description of DifficultyFilter
 *
 * @author test
 */
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
     * Filter by course difficulty.
     *
     * @param  string $access
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
