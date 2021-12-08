<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with(['subjects', 'users'])->filter($request)->get();
        
        return view('books.index', compact('books'));
    }
}
