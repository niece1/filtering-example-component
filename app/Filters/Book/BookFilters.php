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

class BookFilters extends Filters
{
    /**
     * A list of filters.
     *
     * @var array
     */
    protected $filters = [
        'access' => AccessFilter::class,
        'difficulty' => DifficultyFilter::class,
        'type' => TypeFilter::class,
        'subject' => SubjectFilter::class,
        'started' => StartedFilter::class,
        'views' => ViewsOrder::class,
    ];

    /**
     * Mappings for database values.
     *
     * @return array
     */
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
