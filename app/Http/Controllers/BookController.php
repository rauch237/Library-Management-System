<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function __construct(private Book $book){}

    // Show the book creation form
    public function addBook()
    {
        return view('book_form');
    }

    // Store a newly created book
    public function createBook(BookRequest $request)
    {
        $validatedData = $request->validated();
 

        // Handle file upload if there is a cover image
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('public/covers');
            $validatedData['cover_image'] = Storage::url($coverPath); // Get the public URL of the uploaded file
        }

        // Save book data to the database
        $createdBook = $this->book->create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'pages' => $request->pages,
            'status'=>$request->status,
            'cover_image'=>$request->cover_image,
            'description'=>$request->description,
        ]);

        if (!$createdBook) {
            return redirect()->route('book.create')->withErrors('Book creation failed.');
        } else {
            return redirect()->route('book.create')->with('message', 'Your Book Has Been Uploaded Successfully');
        }
    }

    // Display the edit form with the selected book
    public function editBook($id)
    {
        $book = Book::findOrFail($id); // Fetch the book by ID
        return view('edit_book', compact('book')); // Pass the book data to the view
    }

    // Update the specified book in storage
    public function updateBook(BookRequest $request, $id)
    {
        $validatedData = $request->validated();

        // Find the book by ID
        $book = Book::findOrFail($id);

        // Handle file upload if a new cover image is uploaded
        if ($request->hasFile('cover')) {
            if ($book->cover_image) {
                // Delete the old cover image if it exists
                Storage::delete(str_replace('/storage', 'public', $book->cover_image));
            }

            // Store the new cover image
            $coverPath = $request->file('cover')->store('public/covers');
            $validatedData['cover_image'] = Storage::url($coverPath);
        }

        // Update book data in the database
        $book->update([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'genre' => $validatedData['genre'],
            'description' => $validatedData['description'],
            'cover_image' => $validatedData['cover_image'] ?? $book->cover_image // Keep existing cover if no new one uploaded
        ]);

        return redirect()->route('books.edit', $id)->with('success', 'Book details updated successfully!');
    }
}
