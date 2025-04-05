@extends("layouts.app")
@section("content")
    <header class="mb-3 flex items-center py-4">
        <div class="flex w-full items-center justify-between">
            <h2 class="text-sm text-gray-500">My Projects</h2>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main class="-mx-3 lg:flex lg:flex-wrap">
        @forelse ($projects as $project)
            <div class="w-1/3 px-3 pb-6">
                <div
                    class="rounded bg-white p-5 shadow-lg"
                    style="height: 200px"
                >
                    <h3
                        class="mb-3 -ml-5 border-l-4 border-b-blue-400 py-4 pl-4 text-xl font-normal"
                    >
                        <a
                            href="{{ $project->path() }}"
                            class="text-black no-underline"
                        >
                            {{ $project->title }}
                        </a>
                    </h3>

                    <div class="text-gray-500">
                        {{ Illuminate\Support\Str::limit($project->description, 20) }}
                    </div>
                </div>
            </div>
        @empty
            <div>no projects yet.</div>
        @endforelse
    </main>
@endsection
