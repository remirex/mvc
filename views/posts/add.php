<head>
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<div class="add_form" style="width: 500px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Share something</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">Type some text:</label>
                    <textarea name="body" id="body" class="form-control" rows="10"></textarea>
                </div>
                <input type="submit" name="submit" class=" btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>posts">Cancel</a>
            </form>
        </div>
    </div>
</div>