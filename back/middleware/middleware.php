<?php
use middleware\CSRFGuardMiddleware;

$app->add(new CSRFGuardMiddleware());