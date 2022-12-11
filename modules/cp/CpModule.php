<?php

namespace app\modules\cp;

use Yii;
use app\models\User;

/**
 *
 */
class CpModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\cp\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        //проверка доступа для пользователей с ролью администратор в ПУ
        if (empty(Yii::$app->user->identity) || Yii::$app->user->identity->role_id != User::ROLE_ADMIN){
            Yii::$app->user->logout();
            //редирект не отрабатывает, какой то странный но рабочий костыль
            var_dump(Yii::$app->response->redirect(['/logout'],302)->send());
        }


        parent::init();
    }
}
