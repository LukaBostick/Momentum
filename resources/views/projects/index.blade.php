@extends("layouts.app")
@section("content")
    <header class="mb-3 flex items-center py-4">
        <div class="flex w-full items-end justify-between">
            <h2 class="text-sm text-gray-500">My Projects</h2>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
            @include('projects.card')
        @empty
            <div>no projects yet.</div>
        @endforelse
    </main>
@endsection
