<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['slug'] = Str::slug($data['title']) . '-' . Str::lower(Str::random(6));
        $data['is_available'] = $request->boolean('is_available');
        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Книгу додано!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate($this->rules());
        $data['is_available'] = $request->boolean('is_available');
        // Slug залишається незмінним, щоб посилання на книгу не ламалося.
        $book->update($data);
        return redirect()->route('books.show', $book)->with('success', 'Книгу оновлено!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Книгу видалено!');
    }

    private function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'between:1,2100'],
            'description' => ['nullable', 'string'],
            'is_available' => ['sometimes', 'boolean'],
        ];
    }
}
