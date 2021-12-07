<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        return Book::with(['subjects'])->filter($request, $this->getFilters())->get();
    }
    
    protected function getFilters()
    {
        return [
            
        ];
    }
}
