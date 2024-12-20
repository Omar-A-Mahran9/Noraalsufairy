<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreBooksRequest;
use App\Http\Requests\Dashboard\UpdateBooksRequest;
use App\Models\Book;
use App\Models\BookImage;
use Illuminate\Http\Request;

class BookController extends Controller
{
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

        // Authorize the user to create books
        $this->authorize('create_books');
        
        // Get the validated data
        $data = $request->validated();
        unset($data['images']);
        // Handle the main image upload
        if ($request->file('main_image')) {
            $data['main_image'] = uploadImage($request->file('main_image'), "books");
        }
    
        // Create the book record
        $book = Book::create($data);
    
        // Handle additional images (more_images)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                // Upload each image
                $imagePath = uploadImage($file, "books/images");
    
                // Create a BookImage record
                BookImage::create([
                    'book_id' => $book->id,  // Associate image with the created book
                    'image' => $imagePath,    // Store the image path
                ]);
            }
        }
    
        
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
