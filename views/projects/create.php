<?php
include(relative('views/header.php'));
?>
    <form method="POST" action="/projects/create">
        <h3 class="heading is-1">Create a Project</h3>
        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" name="title" placeholder="Title"
                    class="input <?php if ($GLOBALS["error"] == "title") { ?> is-invalid <?php } ?>"
                required autofocus />
                <?php if ($GLOBALS['error'] == "title") { ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo $GLOBALS['errorMessage']; ?></strong>
                </span>
                <?php } ?>
            </div>
        </div>
        <div class="field">
            <label class="label" for="description">Description</label>

            <div class="control">
                <textarea name="description" class="textarea"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">
                    Create Project
                </button>
                <a href="/projects">Cancel</a>
            </div>
        </div>
    </form>

<?php
include(relative('views/footer.php'));
?>
