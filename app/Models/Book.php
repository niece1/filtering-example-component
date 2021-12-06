<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Filters\Book\BookFilters;

class Book extends Model
{
    use HasFactory;
    
    public function scopeFilter(Builder $builder, Request $request, array $filters = [])
    {
        return (new BookFilters($request))->add($filters)->filter($builder);
    }
}
