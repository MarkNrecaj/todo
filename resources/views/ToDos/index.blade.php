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

    <form action="/todo" method="POST">
        @csrf
        Title:<input type="text" name="title" value="{{ old('title') }}" required> <br>
        Content:<input type="text" name="content" value="{{ old('content') }}" required> <br>
        <input type="submit">
    </form>

    <br>

    @foreach ($todos as $todo)
        <br>
        Title: {{ $todo['title'] }} -
        Content: {{ $todo['content'] }}

        <a href="todo/{{ $todo['id'] }}">Edit</a>
        <form action="/todo/{{ $todo['id'] }}" method="POST">
            @csrf
            @method('DELETE') <input type="submit" name="" id="" value="delete">
        </form>
    @endforeach

    {{-- {{ $todos->links() }} --}}
</body>

</html>
