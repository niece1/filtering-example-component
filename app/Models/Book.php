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
    
    public $appends = [
        'started',
    ];
    
    public $hidden = [
        'users'
    ];
    
    public function scopeFilter(Builder $builder, Request $request, array $filters = [])
    {
        return (new BookFilters($request))->add($filters)->filter($builder);
    }
    
    public function getStartedAttribute()
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->users->contains(auth()->user());
    }
    
    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function getFormattedDifficultyAttribute()
    {
        return ucfirst($this->difficulty);
    }

    public function getFormattedTypeAttribute()
    {
        return ucfirst($this->type);
    }

    public function getFormattedAccessAttribute()
    {
        return $this->free === true ? 'Free' : 'Premium';
    }

    public function getFormattedStartedAttribute()
    {
        return $this->started === true ? 'Started' : 'Not started';
    }
}
