<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::latest()->paginate(5);
        // return view('books.index', compact('books'))->with('i', (request()->input('page',1)-1)*5);

        $books = Book::orderBy('published_date', 'desc')->paginate(5);  // Use a column that exists in your table (e.g., 'published_date')
        return view('books.index', compact('books'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required',
            'book_detail' => 'required',
            'book_category' => 'required',
            'price' => 'required',
            'published_date' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success','The book has been inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'book_name' => 'required',
            'book_detail' => 'required',
            'book_category' => 'required',
            'price' => 'required',
            'published_date' => 'required',
        ]);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success','The book has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','The book has been successfully deleted.');
    }
}
