<?php
include(relative('views/header.php'));
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <?php
                global $HTTP_GET_VARS;
                if ($HTTP_GET_VARS["msg"]) { ?>
                <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <?php
                            switch ($HTTP_GET_VARS["msg"]) {
                            case "login":
                                echo "You’re logged in!";
                                break;
                            case "register":
                                echo "You’re registered! Please go ahead and log in.";
                                break;
                            case "logout":
                                echo "You’ve logged out. Until next time!";
                                break;
                            }
                            ?>
                        </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
