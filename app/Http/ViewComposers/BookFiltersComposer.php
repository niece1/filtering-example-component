<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Filters\Book\BookFilters;

class BookFiltersComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'mappings' => BookFilters::mappings()
        ]);
    }
}
