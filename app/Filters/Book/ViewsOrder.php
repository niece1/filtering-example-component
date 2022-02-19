<?php

namespace App\Filters\Book;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ViewsOrder extends Filter
{
    /**
     * Filter by views in descending order.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder
     * @param string $direction
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $direction)
    {
        return $builder->orderBy('views', $this->resolveOrderDirection($direction));
    }
}
