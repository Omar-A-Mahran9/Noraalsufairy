<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreBooksRequest;
use App\Http\Requests\Dashboard\UpdateBooksRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_books');

        if ($request->ajax())
        {
            $data = getModelData(model: new Book());
      
             return response()->json($data);
        }

        return view('dashboard.books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create_books');

        return view('dashboard.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBooksRequest $request)
    {
         $this->authorize('create_books');
        $data=$request->validated();
        if ($request->file('main_image'))
        $data['main_image'] = uploadImage( $request->file('main_image') , "books");

        Book::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
  
     public function show(Book $book)
     {
         $this->authorize('show_books');
         return view('dashboard.books.show',compact('book'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $this->authorize('update_books');
   
        return view('dashboard.books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBooksRequest $request, Book $book)
    {
        $this->authorize('update_books');
        $data=$request->validated();
        if ($request->file('main_image'))
        {
            deleteImage( $book['main_image'] , "books");
            $data['main_image'] = uploadImage( $request->file('main_image') , "books");
        }

        $book->update($data);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Book $book)
    {
        $this->authorize('delete_books');

        if($request->ajax())
        {
            $book->delete();
            deleteImage($book->main_image , 'books' );
        }
    }
}
