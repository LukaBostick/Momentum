@extends("layouts.app")
@section("content")
    <header class="mb-3 flex items-center py-4">
        <div class="flex w-full items-center justify-between">
            <h2 class="text-sm text-gray-500">My Projects</h2>
            <a href="/projects/create" class="text-grey no-underline">
                New Project
            </a>
        </div>
    </header>

    <main class="-mx-3 flex flex-wrap">
        @forelse ($projects as $project)
            <div class="w-1/3 px-3 pb-6">
                <div class="rounded bg-white p-5 shadow" style="height: 200px">
                    <h3 class="py-4 text-xl font-normal">
                        {{ $project->title }}
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
