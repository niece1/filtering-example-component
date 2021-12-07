<?php

namespace App\Filters\Book;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Description of ViewsOrder
 *
 * @author test
 */
class ViewsOrder extends Filter
{
    /**
     * Order by views in descending
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $direction)
    {
        return $builder->orderBy('views', $this->resolveOrderDirection($direction));
    }
}
