<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Filters\Book\BookFilters;


/**
 * Description of BookFiltersComposer
 *
 * @author test
 */
class BookFiltersComposer
{
    public function compose(View $view)
    {
        $view->with([
            'mappings' => BookFilters::mappings()
        ]);
    }
}
