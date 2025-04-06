<div class="bg-white p-5 rounded shadow" style="height: 208px">
        <h3 class="font-normal text-xl py-4  -ml-5  mb-3 border-l-4 border-b-blue-400 pl-4  ">
            <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
        </h3>

        <div class="text-gray-500">{{ Illuminate\Support\Str::limit($project->description, 100) }}</div>

</div>
