<?php

namespace App\Filters\Book;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Filters\Filters;
use App\Models\Subject;
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
    protected $filters = [
        'access' => AccessFilter::class,
        'difficulty' => DifficultyFilter::class,
        'type' => TypeFilter::class,
        'subject' => SubjectFilter::class,
        'started' => StartedFilter::class,
        'views' => ViewsOrder::class,
    ];

    public static function mappings()
    {
        $map = [
            'access' => [
                'free' => 'Free',
                'premium' => 'Premium'
            ],
            'difficulty' => [
                'beginner' => 'Beginner',
                'intermediate' => 'Intermediate',
                'advanced' => 'Advanced'
            ],
            'type' => [
                'snippet' => 'Snippet',
                'project' => 'Project',
                'theory' => 'Theory'
            ],
            'subject' => Subject::get()->pluck('name', 'slug'),
        ];

        if (auth()->check()) {
            $map = array_merge($map, [
                'started' => [
                    'true' => 'Started',
                    'false' => 'Not started'
                ]
            ]);
        }

        return $map;
    }
}
