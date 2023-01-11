<x-layouts.app>
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full ">
            <form action="/todo/{{ $todo['id'] }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-sky-400 flex justify-center">Edit ToDo</h1>
                    <div class="flex flex-col mt-4">
                        <input type="text" name="title" id="title" value="{{ old('title', $todo['title']) }}"
                            class="flex-1  shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker">
                        <input type="text" name="content" id="content"
                            value="{{ old('content', $todo['content']) }}"
                            class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker">
                        <input type="date" name="due_date" id="due_date"
                            value="{{ old('due_date', $todo['due_date']) }}"
                            class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker"
                            placeholder="Add due_date">
                        <button
                            class="flex-1 w-1/2 m-auto p-2 border-2 rounded text-teal border-teal hover:text-white text-teal-500 border-teal-500 hover:bg-teal-500">
                            Edit
                        </button>
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
                <div class="flex justify-between mb-4 items-center">
                    <div class="flex flex-col">
                        <p class="flex-1 text-grey-darkest">
                            {{ $todo['title'] }}</p>
                        <p class="flex-1 w-full text-sm text-grey-darkest">
                            {{ $todo['content'] }}
                            <span> {{ $todo->due_date?->format('d/m/Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
                <p class="text-sm text-red-500">{{ Session::get('message') }}</p>
            @endif

            {{-- {{ $todo->links() }} --}}

        </div>

    </div>
</x-layouts.app>
