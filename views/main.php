<html>
<head>
    <title>Blogpost</title>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Blogpost</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo ROOT_URL?>">Home</a></li>
                <li><a href="<?php echo ROOT_URL?>posts">Posts</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                    <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['name']; ?></a></li>
                    <li><a href="<?php echo ROOT_URL?>users/logout">Logout</a></li>
                <?php else : ?>
                    <li><a href="<?php echo ROOT_URL?>users/login">Login</a></li>
                    <li><a href="<?php echo ROOT_URL?>users/register">Register</a></li>
                <?php endif ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">

    <div class="row">
        <?php require $view; ?>
    </div>

</div><!-- /.container -->
</body>
</html>