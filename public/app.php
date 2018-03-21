<?php
error_reporting(E_ALL & E_NOTICE);

require '../vendor/autoload.php';

$settings = require __DIR__ . '/../back/config/settings.php';

$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../back/config/dependencies.php';

require __DIR__ . '/../back/middleware/middleware.php';

require __DIR__ . '/../back/routes/api.php';

$app->run();