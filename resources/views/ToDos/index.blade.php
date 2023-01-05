<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDo</title>
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold text-sky-400">ToDo</h1>

    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <form action="/todo" method="POST">
        @csrf
        {{-- <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="relative mt-1 rounded-md shadow-sm">
              <input type="title" name="title" id="title" value="{{ old('title') }}" class="block w-full rounded-md border-red-300 pr-10 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 sm:text-sm" placeholder="Enter todo title" aria-invalid="true" aria-describedby="title-error">
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                <!-- Heroicon name: mini/exclamation-circle -->
                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
            <p class="mt-2 text-sm text-red-600" id="title-error">..</p>
          </div> --}}

          <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="mt-1">
              <input type="title" name="title" id="title" value="{{ old('title') }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter todo title">
            </div>
          </div>


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
