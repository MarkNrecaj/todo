<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDo</title>
</head>

<body>
    <h1>ToDo</h1>

    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <form action="/todo/{{ $todo['id'] }}" method="POST">
        @csrf
        @method("PATCH")
        Title:<input type="text" name="title" value="{{ old('title', $todo['title']) }}" required>
        <input type="submit">
    </form>

    <br>


    <br>
    Title: {{ $todo['title'] }}



    {{-- {{ $todos->links() }} --}}
</body>

</html>
