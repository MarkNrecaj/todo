<x-layouts.app>
    <!-- component -->
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full  ">
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
                        <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
                            class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker"
                            placeholder="Add due_date">
                        <button
                            class="flex-1 w-1/2 m-auto p-2 border-2 rounded text-teal border-teal hover:text-white text-teal-500 border-teal-500 hover:bg-teal-500">Add</button>

                    </div>
                </div>
            </form>

            @if ($errors->any())
                <div>
                    <ul class="mb-4">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                @foreach ($todos as $todo)
                    <div class="flex justify-between mb-4 items-center">
                        <div class="flex flex-col">
                            <p
                                class="flex-1  {{ $todo['completed_at'] ? 'line-through text-green-600' : 'text-grey-darkest' }} ">
                                {{ $todo['title'] }}
                            </p>
                            <p
                                class="flex-1 w-full text-sm {{ $todo['completed_at'] ? 'line-through text-green-600' : 'text-grey-darkest' }}"
                                >
                                {{ $todo['content'] }}
                                <span> {{ $todo->due_date?->format('d/m/Y') }}</span>
                            </p>
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

            {{ $todos->links() }}

        </div>

    </div>
    {{-- {{ $todos->links() }} --}}
</x-layouts.app>
