<?php

namespace App\Filters\Book;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Description of TypeFilter
 *
 * @author test
 */
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
     * Filter by book type.
     *
     * @param  string $type
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
