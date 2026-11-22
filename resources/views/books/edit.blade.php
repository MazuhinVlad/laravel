<x-layouts.app title="Редагувати книгу">
    <h2>Редагувати: {{ $book->title }}</h2>
    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')
        @include('books.form')
    </form>
</x-layouts.app>
