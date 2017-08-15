<?php

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blog');

define('ROOT_PATH', '/mvc/');
define('ROOT_URL', 'http://localhost/mvc/');

require_once'core/Bootstrap.php';
require_once'core/Controller.php';
require_once'core/Model.php';
require_once'core/Messages.php';

require_once'controllers/home.php';
require_once'controllers/posts.php';
require_once'controllers/users.php';

require_once'models/home.php';
require_once'models/post.php';
require_once'models/user.php';

