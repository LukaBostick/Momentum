<?php
include(relative('views/header.php'));
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="/login">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control <?php if ($GLOBALS["error"] == "email") { ?> is-invalid <?php } ?>"
                                name="email" value="<?php echo $GLOBALS["old"]["email"] ?>"
                                required autocomplete="email" autofocus>

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
                                    class="form-control <?php if ($GLOBALS["error"] == "password") { ?> is-invalid <?php } ?>"
                                    name="password" required autocomplete="current-password">

                                <?php if ($GLOBALS['error'] == "password") { ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo $GLOBALS['errorMessage']; }?></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        <?php if ($GLOBALS["old"]["remember"]) { echo "checked"; } ?> >

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
