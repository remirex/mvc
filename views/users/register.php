<head>
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<div class="add_user" style="width: 500px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">User Registration</h3>
        </div>
        <div class="panel-body">
            <?php Messages::displayMsg(); ?>
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <input type="submit" name="submit" class=" btn btn-primary" value="Regist">
            </form>
        </div>
    </div>
</div>