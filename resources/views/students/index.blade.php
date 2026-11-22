<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Студенти</title>
</head>
<body>

    <h1>Додати студента</h1>

    <form action="/students" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Ім'я студента">

        <button type="submit">Додати</button>
    </form>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if($errors->any())
        <p style="color: red;">
            {{ $errors->first() }}
        </p>
    @endif

    <h2>Останні 10 студентів</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
        </tr>

        @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Студентів поки немає</td>
            </tr>
        @endforelse
    </table>

</body>
</html>
