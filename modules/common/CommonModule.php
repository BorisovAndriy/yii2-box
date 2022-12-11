<?php

namespace app\modules\common;

use Yii;
use app\models\User;

/**
 *
 */
class CommonModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\common\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}
