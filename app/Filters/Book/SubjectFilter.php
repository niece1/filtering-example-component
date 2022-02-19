<?php

namespace App\Filters\Book;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class SubjectFilter extends Filter
{
    /**
     * Filter book by subject.
     *
     * @param Illuminate\Database\Eloquent\Builder $builder
     * @param mixed $value
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $value)
    {
        return $builder->whereHas('subjects', function (Builder $builder) use ($value) {
            $builder->where('slug', $value);
        });
    }
}
