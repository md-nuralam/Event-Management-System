<?php include_once('session_user.php'); ?>
<!DOCTYPE html>
<html>
    <head>   
        <title>Dashboard</title>
        <?php include_once('bootstrap.php'); ?>
    </head>
    <body>

        <?php include_once('header.php'); ?>

            <section class="col-md-10 pt-5">
                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Manager</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Customer</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Event</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <?php include_once('javascript.php'); ?>
        <?php include_once('index_footer.php'); ?>

    </body>
</html>