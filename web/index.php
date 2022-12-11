<?php

// comment out the following two lines when deployed to production

/**
 * Для версии в режиме разработки создать файл /config/debug.php
 */
if (file_exists(__DIR__ . '/../config/debug.php')) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
