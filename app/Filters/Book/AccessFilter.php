<?php

namespace App\Filters\Book;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Description of AccessFilter
 *
 * @author test
 */
class AccessFilter extends Filter
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'free' => true,
            'premium' => false,
        ];
    }
    
    /**
     * Filter by book access type (free, premium).
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

        return $builder->where('free', $value);
    }
}
