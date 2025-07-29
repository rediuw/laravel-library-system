<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $borrowings = Borrowing::with('book', 'user')->get();
        } else {
            $borrowings = Borrowing::with('book')->where('user_id', Auth::id())->get();
        }
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::all();
        return view('borrowings.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate(['book_id' => 'required|exists:books,id']);

        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'borrowed_at' => now(),
            'returned_at' => null,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Book borrowed');
    }
}
