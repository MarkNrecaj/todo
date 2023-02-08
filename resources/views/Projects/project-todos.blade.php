<x-layouts.app>
    <!-- component -->
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full  ">
            <form action="/todo" method="POST">
                @csrf
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-sky-400 flex justify-center">ToDo</h1>

                    <div class="flex flex-col mt-4">
                        <div class="flex-1">
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                Title
                            </label>
                            <div class="mt-1">
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker"
                                    placeholder="Add Todo">
                            </div>
                        </div>

                        <div class="flex-1">
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <div class="mt-1">
                                <input type="text" name="content" id="content" value="{{ old('content') }}"
                                    class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker"
                                    placeholder="Add Description">
                            </div>
                        </div>

                        <label for="due_date" class="block text-sm font-medium text-gray-700">Due date</label>
                        <div id="due_pri" class="flex flex-col">
                            <div class="flex-1">
                                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker"
                                    placeholder="Add due_date">
                            </div>
                            <div class="flex-1">
                                <label for="priority" class="mb-0.5 block text-sm font-medium text-gray-700">Select an
                                    Priority
                                </label>
                                <select id="priority" name="priority"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker">
                                    <option class="hidden" value="" disabled selected>Select your priority
                                    </option>
                                    @foreach ($priorities as $priority)
                                        <option>{{ $priority }}</option>
                                    @endforeach
                                    <option>{{ $priority }}AssA</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="tag" class="block text-sm font-medium text-gray-700">
                                Enter Tags
                            </label>
                            <div class="mt-1">
                                <input type="text" name="tags" id="tags" value="{{ old('tags') }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 mb-2 text-grey-darker"
                                    placeholder="Tag1,Tag2,Tag3...">
                            </div>
                        </div>
                        <button
                            class="mb-4 flex-1 w-1/2 m-auto p-2 border-2 rounded text-teal border-teal hover:text-white text-teal-500 border-teal-500 hover:bg-teal-500">Add</button>

                    </div>
                </div>
            </form>
            {{-- seperate errors as a component --}}
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
                    {{-- <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including
                                their name, title, email and role.</p>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            <button type="button"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                                user</button>
                        </div>
                    </div> --}}
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="shadow-sm ring-1 ring-black ring-opacity-5">
                                    <table class="min-w-full border-separate" style="border-spacing: 0">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                {{-- <th scope="col"
                                                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                                    ID</th> --}}
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
                                                <th scope="col"
                                                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                                    Tags</th>
                                                <th scope="col"
                                                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                                    Buttons</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            @foreach ($todos as $todo)
                                                <tr>
                                                    {{-- <td
                                                        class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium {{ $todo['completed_at'] ? 'text-green-600' : 'text-grey-900' }} sm:pl-6 lg:pl-8">
                                                        {{ $todo['id'] }}
                                                    </td> --}}
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
                                                            <span>No due date</span>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">
                                                        {{ ucfirst($todo['priority']) }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">
                                                        
                                                        @foreach ($todo->tags as $tag)
                                                                <div class=" bg-red-300 text-black inline-block rounded-full p-1">{{ ($tag['name']) }}</div>
                                                        @endforeach
                                                    </td>
                                                    {{-- buttons --}}
                                                    <td
                                                        class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <div id="buttons" class="flex justify-end">
                                                            <form action="/todo/completed/{{ $todo['id'] }}"
                                                                method="POST">
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
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <!-- More todos... -->
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

            {{ $todos->links() }}

        </div>

    </div>
    {{-- {{ $todos->links() }} --}}
</x-layouts.app>
