@extends("layouts.app")

@section("content")
    <header class="mb-3 flex items-center py-4">
        <div class="flex w-full items-end justify-between">
            <p class="text-sm font-normal text-gray-500">
                <a
                    href="/projects"
                    class="text-s, font-normal text-gray-500 no-underline"
                >
                    My Projects
                </a>
                / {{ $project->title }}
            </p>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main>
        <div class="-wx-3 lg:flex">
            <div class="mb-6 px-3 lg:w-3/4">
                <div class="mb-8">
                    <h2 class="mb-3 text-lg font-normal text-gray-400">
                        Tasks
                    </h2>
                    {{-- Tasks --}}
                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">{{ $task->body }}</div>
                    @endforeach
                </div>

                <div>
                    <h2 class="mb-3 text-lg font-normal text-gray-400">
                        General Notes
                    </h2>
                    {{-- General notes --}}
                    <textarea class="card w-full" style="min-height: 200px">
Lorem Ipsem. </textarea
                    >
                </div>
            </div>
            <div class="px-3 lg:w-1/4">
                <div class="rounded bg-white p-5 shadow" style="height: 208px">
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
                        {{ $project->description }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
