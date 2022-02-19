<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Description of Filters
 *
 * @author test
 */
abstract class Filters
{
    protected $request;

    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter(Builder $builder)
    {
        foreach ($this->getFilters() as $filter => $value) {
            $this->resolveFilter($filter)->filter($builder, $value);
        }
        return $builder;
    }

    /**
     * Instantiate a filter.
     *
     * @param  string $filter
     * @return mixed
     */
    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter]();
    }

    /**
     * Add filters.
     *
     * @param array $filters
     */
    public function add(array $filters)
    {
        $this->filters = array_merge($this->filters, $filters);

        return $this;
    }

    /**
     * Get filters to be used.
     *
     * @return array
     */
    protected function getFilters()
    {
        return $this->filterFilters($this->filters);
    }

    /**
     * Filter filters that are only in the request.
     *
     * @param  array $filters
     * @return array
     */
    protected function filterFilters($filters)
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }
}
