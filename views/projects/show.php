<?php
include(relative('database/store.php'));
include(relative('database/model/project.php'));

include(relative('views/header.php'));

$project = find_object("project", basename(getenv("REQUEST_URI")));
?>

    <header class="mb-3 flex items-center py-4">
        <div class="flex w-full items-end justify-between">
            <p class="text-sm text-gray-500 font-normal">
                <a href="/projects" class ="text-gray-500 text-s, font-normal no-underline">My Projects</a> / <?php echo $project->title; ?></p>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -wx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-400 font-normal mb-3">Tasks</h2>
                        <?php foreach($project->tasks as $task) { ?>
                    <div class="card mb-3"><input type="checkbox" /> <?php echo $task; ?></div>
                    <?php } ?>

                    <div class="card mb-3">
                        <form action="/projects/<?php echo $project->id ?>/tasks" method="POST">
                            <input type="hidden" name="project" value="<?php echo $project->id ?>">
                            <input placeholder="Begin adding tasks…" class="w-full" name="body">
                        </form>
                    </div>
                    </div>

                    <div>
                <h2 class="text-lg text-gray-400  font-normal mb-3">General Notes</h2>
                <textarea class="card w-full" style="min-height:200px">Lorem Ipsem.</textarea>
            </div>
        </div>
            <div class="lg:w-1/4 px-3">
                    @include('projects.card');
            </div>
        </div>

    </main>
