<?php

namespace app\modules\common\controllers;

use yii\web\Controller;


class CommonController  extends Controller {
    public $layout='main';

       public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


}