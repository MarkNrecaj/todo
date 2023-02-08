<x-layouts.app>
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full ">
            {{-- <form action="/todo/{{ $todo['id'] }}" method="POST">
                @csrf
                @method('PATCH') --}}

            @if (true)
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-sky-400 flex justify-center mb-4">Projects</h1>
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Create a new project.</h3>
                        <p class="mt-1 text-sm text-gray-500">Or open a specific project below</p>
                        <div class="mt-6">
                            <a class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                href="{{ route('project.redirect') }}">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                </svg>
                                New Project
                            </a>
                        </div>
                    </div>

                </div>
            @endif

            <div class="showProjects">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">My Projects</h2>
                    <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                        @foreach ($projects as $project)
                            <li class="col-span-1 flex rounded-md shadow-sm">
                                <div
                                    class="flex-shrink-0 uppercase flex items-center justify-center w-16 bg-pink-600 text-white text-sm font-medium rounded-l-md">
                                    {{ $project->name[0] }}</div>
                                <div
                                    class="flex flex-1 items-center justify-between truncate rounded-r-md border-t border-r border-b border-gray-200 bg-white">
                                    <div class="flex-1 truncate px-4 py-2 text-sm">
                                        {{-- <form action="/project/{{ $project['id'] }}/todo">
                                            @csrf --}}
                                        <div class="font-medium text-gray-900 hover:text-gray-600">
                                            {{ $project->name }}
                                        </div>
                                        {{-- </form> --}}
                                        <p class="text-gray-500">1 Member</p>
                                    </div>
                                    <div class="flex-shrink-0 pr-2">
                                        <form action="/projects/{{ $project['id'] }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white  text-red-400 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                <span class="sr-only">Delete</span>
                                                <!-- Heroicon name: mini/ellipsis-vertical -->

                                                <?xml version="1.0" encoding="utf-8"?>
                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                <svg class="h-6 w-6" viewBox="0 0 1024 1024"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="#000000" class="text-red-600"
                                                        d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>




            @if (Session::has('message'))
                <p class="text-sm text-red-500">{{ Session::get('message') }}</p>
            @endif
        </div>
    </div>
</x-layouts.app>
