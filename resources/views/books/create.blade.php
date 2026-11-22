<x-layouts.app title="Додати книгу">
    <h2>Нова книга</h2>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        @include('books.form')
    </form>
</x-layouts.app>
