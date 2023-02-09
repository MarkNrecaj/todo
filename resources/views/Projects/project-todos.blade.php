<x-layouts.app>
    <!-- component -->
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full  ">
            <form action="/project/todo/{{$project->id}}" method="POST">
                @csrf
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-sky-400 flex justify-center">{{ $project->name }} - Project</h1>

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

                    {{-- SHOW TODOS TABLE --}}

                </div>
            </div>
            @if (Session::has('message'))
                <p class="text-sm text-red-500">{{ Session::get('message') }}</p>
            @endif

            {{-- {{ $todos->links() }} --}}

        </div>

    </div>
    {{-- {{ $todos->links() }} --}}
</x-layouts.app>
