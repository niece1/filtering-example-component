<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * Description of Filter
 *
 * @author test
 */
abstract class Filter
{
    /**
     * Apply filter.
     *
     * @param  Builder $builder
     * @param  mixed  $value
     *
     * @return Builder
     */
    public abstract function filter(Builder $builder, $value);
    
    /**
     * Database value mappings.
     *
     * @return array
     */
    protected function mappings()
    {
        return [];
    }
    
    /**
     * Resolve the value used for filtering.
     *
     * @param  mixed $key
     * @return mixed
     */
    protected function resolveFilterValue($key)
    {
        return Arr::get($this->mappings(), $key);
    }
}
