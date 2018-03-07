<?php

defined("PRJ_PATH")
  or define("PRJ_PATH", realpath(dirname(__FILE__) . '/..'));

defined("LIBRARY_PATH")
  or define("LIBRARY_PATH", realpath(PRJ_PATH . '/lib'));
defined("VIEW_PATH")
  or define("VIEW_PATH", realpath(PRJ_PATH . "/view"));
defined("CONTROLLER_PATH")
  or define("CONTROLLER_PATH", realpath(PRJ_PATH . "/controller"));
defined("MODEL_PATH")
  or define("MODEL_PATH", realpath(PRJ_PATH . '/model'));



?>
