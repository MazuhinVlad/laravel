<x-layouts.app :title="$book->title">
    <h2>{{ $book->title }}</h2>
    <p><strong>Автор:</strong> {{ $book->author }}</p>
    <p><strong>Рік:</strong> {{ $book->year }}</p>
    <p><strong>Опис:</strong> {{ $book->description ?: 'Опис відсутній' }}</p>
    <p><x-badge :available="$book->is_available" /></p>
    <a href="{{ route('books.edit', $book) }}">Редагувати</a>
    <form action="{{ route('books.destroy', $book) }}" method="POST" style="margin-top: 15px">
        @csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>
</x-layouts.app>
