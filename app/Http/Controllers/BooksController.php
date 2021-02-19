<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store()
    {
        $book = Book::create($this->vadateRequest());

        return redirect($book->path());
    }

    public function update(Book $book)
    {
        $book->update($this->vadateRequest());

        return redirect($book->path());
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }

    protected function vadateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author_id' => 'required'
        ]);
    }
}
