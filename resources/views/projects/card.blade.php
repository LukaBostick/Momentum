<div class="card flex flex-col" style="height: 200px">
    <h3
        class="border-accent-light mb-3 -ml-5 border-l-4 py-4 pl-4 text-xl font-normal"
    >
        <a href="{{ $project->path() }}" class="text-default no-underline">
            {{ $project->title }}
        </a>
    </h3>

    <div class="mb-4 flex-1">
        {{ Illuminate\Support\Str::limit($project->description, 100) }}
    </div>

    @can("manage", $project)
        <footer>
            <form
                method="POST"
                action="{{ $project->path() }}"
                class="text-right"
            >
                @method("DELETE")
                @csrf
                <button type="submit" class="text-xs">Delete</button>
            </form>
        </footer>
    @endcan
</div>
