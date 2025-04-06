<?php
if (basename(getenv("REQUEST_URI")) != "projects") {
	include(relative('views/projects/show.php'));
	return;
}

include(relative('database/store.php'));
include(relative('database/model/project.php'));

include(relative('views/header.php'));
?>
		<header class="mb-3 flex items-center py-4">
			<div class="flex w-full items-center justify-between">
				<h2 class="text-sm text-gray-500">My Projects</h2>
				<a href="/projects/create" class="text-grey no-underline">
					New Project
				</a>
			</div>
		</header>

		<main class="-mx-3 flex flex-wrap">
			<?php
			$projects = list_objects('project');

			if (count($projects) == 0) {
			?>
				<div>no projects yet.</div>
			<?php
			}

			foreach($projects as $project_id) {
				$project = find_object('project', $project_id);
			?>
				<a href="/projects/<?php echo $project_id; ?>">
			<div class="w-1/3 px-3 pb-6">
				<div class="rounded bg-white p-5 shadow" style="height: 200px">
					<h3 class="py-4 text-xl font-normal">
						<?php echo $project->title; ?>
					</h3>

					<div class="text-gray-500">
						<?php echo $project->description; } ?>
					</div>
				</div>
			</div>
				</a>
		</main>

<?php
//include(relative('views/footer.php');
?>
