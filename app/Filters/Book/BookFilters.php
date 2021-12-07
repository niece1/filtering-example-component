<?php

namespace App\Filters\Book;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Filters\Filters;
use App\Filters\Book\{
    AccessFilter,
    DifficultyFilter,
    StartedFilter,
    SubjectFilter,
    TypeFilter,
    ViewsOrder
};

/**
 * Description of BookFilters
 *
 * @author test
 */
class BookFilters extends Filters

{
    protected $filters =[
        'access' => AccessFilter::class,
        'difficulty' => DifficultyFilter::class,
        'type' => TypeFilter::class,
        'subject' => SubjectFilter::class,
        'started' => StartedFilter::class,
        'views' => ViewsOrder::class,
    ];
    
    
}
