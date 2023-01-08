<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDo</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- component -->
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-xl">
            <form action="/todo" method="POST">
                @csrf
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-sky-400 flex justify-center">ToDo</h1>

                    <div class="flex flex-col mt-4">
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="flex-1  shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker"
                            placeholder="Add Todo">
                        <input type="text" name="content" id="content" value="{{ old('content') }}"
                            class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker"
                            placeholder="Add Description">
                        <button
                            class="flex-1 w-1/2 m-auto p-2 border-2 rounded text-teal border-teal hover:text-white text-teal-500 border-teal-500 hover:bg-teal-500">Add</button>

                    </div>
                </div>
            </form>

            <div>
                @foreach ($todos as $todo)
                    <div class="flex justify-between mb-4 items-center">
                        <div class="flex flex-col">
                            <p
                                class="flex-1  {{ $todo['completed_at'] ? 'line-through text-green-600' : 'text-grey-darkest' }} ">
                                {{ $todo['title'] }}</p>
                            <p
                                class="flex-1w-full text-sm {{ $todo['completed_at'] ? 'line-through text-green-600' : 'text-grey-darkest' }}">
                                {{ $todo['content'] }}</p>
                        </div>
                        <div class="flex">
                            <form action="/todo/completed/{{ $todo['id'] }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button
                                    class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white {{ !$todo['completed_at'] ? 'text-green-500 border-green-500 hover:bg-green-500' : 'text-gray-500 border-gray-500 hover:bg-gray-500' }} ">
                                    {{ !$todo['completed_at'] ? 'Done' : 'Not Done' }}
                                </button>
                            </form>
                            <form action="/todo/{{ $todo['id'] }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="flex-no-shrink p-2 ml-2  border-2 rounded text-red-500 border-red-500 hover:text-white hover:bg-red-500">
                                    Remove
                                </button>
                            </form>
                            <form action="/todo/{{ $todo['id'] }}">
                                @csrf
                                <button
                                    class="flex-no-shrink p-2 ml-2 border-2 rounded text-blue-500 border-blue-500 hover:text-white hover:bg-blue-500">
                                    Edit
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
            @if (Session::has('message'))
                <p class="text-sm text-red-500">{{ Session::get('message') }}</p>
            @endif
        </div>

    </div>
    {{-- {{ $todos->links() }} --}}
</body>

</html>
