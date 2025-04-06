<?php
if ($GLOBALS['user_email']) { header('Location: /'); }

include(relative('views/header.php'));
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="/register">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control <?php if ($GLOBALS['error'] == "name") { ?> is-invalid <?php } ?>"
                                    name="name" value="<?php echo $GLOBALS['old']['name']; ?>" required autocomplete="name" autofocus>

                                <?php if ($GLOBALS['error'] == "name") { ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo $GLOBALS['errorMessage']; }?></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control <?php if ($GLOBALS['error'] == "email") { ?> is-invalid <?php } ?>"
                                    name="email" value="<?php echo $GLOBALS['old']['email']; ?>"
                                    required autocomplete="email">

                                <?php if ($GLOBALS['error'] == "email") { ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo $GLOBALS['errorMessage']; } ?></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control <?php if ($GLOBALS['error'] == "password") { ?> is-invalid <?php } ?>"
                                    name="password" required autocomplete="new-password">
                                <?php if ($GLOBALS['error'] == "password") { ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo $GLOBALS['errorMessage']; } ?></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password"
                                    class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

