<x-layouts.app>
    <!-- component -->
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full  ">
            <form action="/todo" method="POST" enctype="multipart/form-data">
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
                        <div class="flex-1">
                            <label for="cover-photo" class="block text-sm font-medium text-gray-700">Upload File</label>
                            <div
                                class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 pt-4">
                            <div class="flex justify-center">
                                <button
                                    class="mb-4 flex-1 max-w-xs m-auto p-2 border-2 rounded text-teal border-teal hover:text-white text-teal-500 border-teal-500 hover:bg-teal-500">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                                                    <div
                                                        class=" {{ $tag ? 'bg-red-300' : 'bg-blue-300' }} text-black inline-block rounded-full p-1">
                                                        {{ $tag['name'] }}</div>
                                                @endforeach
                                            </td>
                                            {{-- buttons --}}
                                            <td
                                                class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                                <div id="buttons" class="flex  justify-evenly">
                                                    <form action="/todo/favorite/{{ $todo['id'] }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="  ml-4 mr-2  ">
                                                            {{-- {{ !$todo['favorite'] ? 'Done' : 'Not Done' }} --}}

                                                            @if ($todo['favorite'])
                                                                <div class="Fav block w-7 h-7">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="#ff385c" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="white">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                                                    </svg>
                                                                </div>
                                                            @else
                                                                <div class="notFav block w-7 h-7"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="rgba(0, 0, 0, 0.5);" fill-opacity="0.5"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="white">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                                                    </svg>
                                                                </div>
                                                            @endif
                                                        </button>
                                                    </form>
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
                                                    <div x-data="{ modelOpen: false }">
                                                        <button @click="modelOpen =!modelOpen"
                                                            class="flex-no-shrink p-2 ml-2 border-2 rounded text-purple-500 border-purple-500 hover:text-white hover:bg-purple-500">
                                                            Files
                                                        </button>
                                                        <div x-show="modelOpen"
                                                            class="fixed inset-0 z-50 overflow-y-auto"
                                                            aria-labelledby="modal-title" role="dialog"
                                                            aria-modal="true">
                                                            <div
                                                                class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                                                <div x-cloak @click="modelOpen = false"
                                                                    x-show="modelOpen"
                                                                    x-transition:enter="transition ease-out duration-300 transform"
                                                                    x-transition:enter-start="opacity-0"
                                                                    x-transition:enter-end="opacity-100"
                                                                    x-transition:leave="transition ease-in duration-200 transform"
                                                                    x-transition:leave-start="opacity-100"
                                                                    x-transition:leave-end="opacity-0"
                                                                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                                                    aria-hidden="true"></div>

                                                                <div x-cloak x-show="modelOpen"
                                                                    x-transition:enter="transition ease-out duration-300 transform"
                                                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                                    x-transition:leave="transition ease-in duration-200 transform"
                                                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                                                    <div
                                                                        class="flex items-center justify-end space-x-4">
                                                                        <button @click="modelOpen = false"
                                                                            class="text-gray-600 focus:outline-none hover:text-gray-700">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="w-6 h-6" fill="none"
                                                                                viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                    <div
                                                                        class="grid grid-cols-1 place-content-stretch">
                                                                        @if ($todo->file_path)
                                                                            <img src="{{ 'http://127.0.0.1:8000/storage/' . $todo->file_path }}"
                                                                                alt="{{ $todo->title . '\'s photo' }}"
                                                                                class=" w-full h-full mr-3" />
                                                                        @endif
                                                                    </div>




                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
