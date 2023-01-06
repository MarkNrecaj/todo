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
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
            <form action="/todo" method="POST">
                @csrf
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-sky-400 flex justify-center">ToDo</h1>
                    @if (Session::has('message'))
                        {{ Session::get('message') }}
                    @endif
                    <div class="flex col-span-1 mt-4">
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                            placeholder="Add Todo">
                        <input type="text" name="content" id="content" value="{{ old('content') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                            placeholder="Add Description">
                        <button
                            class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">Add</button>
                    </div>
                </div>
            </form>

            <div>
                @foreach ($todos as $todo)
                    <div class="flex mb-4 items-center">
                        <div class="flex w-full">
                            <p class="font-bold {{ $todo['completed_at'] ? 'line-through text-red-600' : 'text-grey-darkest'}} ">{{ $todo['title'] }}</p>
                            <p class="w-full {{ $todo['completed_at'] ? 'line-through text-red-600' : 'text-grey-darkest'}}">{{ $todo['content'] }}</p>
                        </div>
                        <form action="/todo/completed/{{ $todo['id'] }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button
                                class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white {{ !$todo['completed_at'] ? 'text-green-500 border-green-500 hover:bg-green-500' : 'text-gray-500 border-gray-500 hover:bg-gray-500'}} ">
                                {{ !$todo['completed_at'] ? 'Done' : 'Not Done'}}
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
                        <form action="{{ $todo['id']}}">
                            <button
                                class="flex-no-shrink p-2 ml-2 border-2 rounded text-blue-500 border-blue-500 hover:text-white hover:bg-blue-500">
                                Edit
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- {{ $todos->links() }} --}}
</body>

</html>
