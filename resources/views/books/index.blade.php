<x-layouts.app title="Каталог книг">
    <h2>Список книг</h2>
    <table>
        <thead><tr><th>№</th><th>Назва</th><th>Автор</th><th>Наявність</th></tr></thead>
        <tbody>
        @forelse($books as $book)
            <tr @class(['alternate' => $loop->even])>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                <td>{{ $book->author }}</td>
                <td><x-badge :available="$book->is_available" /></td>
            </tr>
        @empty
            <tr><td colspan="4">Книг поки немає.</td></tr>
        @endforelse
        </tbody>
    </table>
</x-layouts.app>
