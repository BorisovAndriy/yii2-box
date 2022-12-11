<?php

namespace app\modules\cp\controllers;

use yii\web\Controller;

/**
 * Dashboard controller for the `cp` module
 */
class DashboardController extends CpController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
