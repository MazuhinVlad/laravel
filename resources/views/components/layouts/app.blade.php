@props(['title' => 'Каталог книг'])
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 18px; color: #222; }
        nav { display: flex; gap: 12px; margin-bottom: 22px; }
        nav a { padding: 9px 12px; text-decoration: none; border-radius: 5px; color: #222; background: #eee; }
        nav a.active { background: #234d8c; color: white; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        tr:nth-child(even) { background: #f2f5fa; }
        label { display: block; margin: 12px 0; }
        input:not([type=checkbox]), textarea { display: block; width: 100%; box-sizing: border-box; padding: 8px; }
        button { padding: 8px 12px; cursor: pointer; }
        .error { color: #b00020; } .success { color: #187334; }
        .badge { padding: 4px 8px; border-radius: 5px; background: #eee; }
        .yes { background: #d8f1db; } .no { background: #ffe0df; }
    </style>
</head>
<body>
    <header><h1>Міні-каталог книг</h1></header>
    <nav>
        <a href="{{ route('books.index') }}" @class(['active' => request()->routeIs('books.index', 'books.show')])>Каталог</a>
        <a href="{{ route('books.create') }}" @class(['active' => request()->routeIs('books.create')])>Додати книгу</a>
        <a href="{{ route('admin.statistics') }}" @class(['active' => request()->routeIs('admin.*')])>Статистика</a>
    </nav>
    @if(session('success')) <p class="success">{{ session('success') }}</p> @endif
    <main>{{ $slot }}</main>
</body>
</html>
