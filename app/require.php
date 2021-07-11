<?php

use app\libraries\Application;

require_once "__autoload.php";

$init = new Application;

require_once "router.php";

$init->run();