<?php

namespace App\Filters\Book;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Description of SubjectFilter
 *
 * @author test
 */
class SubjectFilter extends Filter
{
    /**
     * Filter by subject.
     *
     * @param  string $subject
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $value)
    {
        return $builder->whereHas('subjects', function (Builder $builder) use ($value) {
            $builder->where('slug', $value);
        });
    }
}
