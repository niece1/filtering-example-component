<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

abstract class Filter
{
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
     * Apply filter.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder
     * @param mixed $value
     */
    abstract public function filter(Builder $builder, $value);

    /**
     * Resolve the value used for filtering.
     *
     * @param mixed $key
     * @return mixed
     */
    protected function resolveFilterValue($key)
    {
        return Arr::get($this->mappings(), $key);
    }

    /**
     * Resolve the order direction to be used.
     *
     * @param string $direction
     * @return string
     */
    protected function resolveOrderDirection($direction)
    {
        return Arr::get([
            'desc' => 'desc',
            'asc' => 'asc'
        ], $direction, 'desc');
    }
}
