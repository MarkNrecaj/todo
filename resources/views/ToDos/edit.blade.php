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
                {{-- table component must seperate later --}}
                <div class="px-4 sm:px-6 lg:px-8 mb-10">
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="shadow-sm ring-1 ring-black ring-opacity-5">
                                    <table class="min-w-full border-separate" style="border-spacing: 0">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                                    ID</th>
                                                <th scope="col"
                                                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                                    Title</th>
                                                <th scope="col"
                                                    class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">
                                                    Content</th>
                                                <th scope="col"
                                                    class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">
                                                    Due date</th>
                                                <th scope="col"
                                                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                                    Priority</th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">

                                            <tr>
                                                <td
                                                    class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium {{ $todo['completed_at'] ? 'text-green-600' : 'text-grey-900' }} sm:pl-6 lg:pl-8">
                                                    {{ $todo['id'] }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium {{ $todo['completed_at'] ? 'text-green-600' : 'text-grey-900' }} sm:pl-6 lg:pl-8">
                                                    {{ $todo['title'] }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm {{ $todo['completed_at'] ? 'text-green-600' : 'text-grey-900' }} hidden sm:table-cell">
                                                    {{ $todo['content'] }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">

                                                    @if ($todo->due_date)
                                                        <span>{{ $todo->due_date?->format('d.m.Y') }}</span>
                                                    @else
                                                        <span>No due date
                                                    @endif
                                                </td>
                                                <td
                                                    class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">
                                                    Member
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
                <p class="text-sm text-red-500">{{ Session::get('message') }}</p>
            @endif
        </div>
    </div>
</x-layouts.app>
