<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Filters\Book\BookFilters;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    /**
     * The attribute to append the model's array.
     *
     * @var array
     */
    public $appends = [
        'started',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    public $hidden = [
        'users'
    ];

    /**
     * Scope a query to create a book filter.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Http\Request $request
     * @param  array $filters
     * @return mixed
     */
    public function scopeFilter(Builder $builder, Request $request, array $filters = [])
    {
        return (new BookFilters($request))->add($filters)->filter($builder);
    }

    /**
     * Get the book's started attribute.
     *
     * @return mixed
     */
    public function getStartedAttribute()
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->users->contains(auth()->user());
    }

    /**
     * Get all the book's subjects.
     */
    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }

    /**
     * Get users associated with specified book.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get uppercased book difficulty.
     *
     * @return string
     */
    public function getFormattedDifficultyAttribute()
    {
        return ucfirst($this->difficulty);
    }

    /**
     * Get uppercased book type.
     *
     * @return string
     */
    public function getFormattedTypeAttribute()
    {
        return ucfirst($this->type);
    }

    /**
     * Get access type.
     *
     * @return string
     */
    public function getFormattedAccessAttribute()
    {
        return $this->free == true ? 'Free' : 'Premium';
    }

    /**
     * Get started or not attribute.
     *
     * @return string
     */
    public function getFormattedStartedAttribute()
    {
        return $this->started == true ? 'Started' : 'Not started';
    }
}
