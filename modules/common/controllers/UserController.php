<?php

namespace app\modules\common\controllers;

use app\models\LoginForm;
use Yii;
use yii\helpers\Url;
use app\models\User;

class UserController extends CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /*
    public function actionLogin()
    {
        $this->layout = "@app/modules/cp/views/layouts/login";

        if ((Yii::$app->params['cp']['loginUrl'] != Url::current())
            &&
            (Yii::$app->user->isGuest && !empty(Yii::$app->user->identity->role_id) && Yii::$app->user->identity->role_id != User::ROLE_ADMIN)) {
            return Yii::$app->response->redirect(Yii::$app->params['cp']['loginUrl']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login(User::ROLE_ADMIN)) {
            return Yii::$app->response->redirect(Yii::$app->params['cp']['defaultUrlAfterLogin']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return \Yii::$app->response->redirect([Yii::$app->params['cp']['loginUrl']]);
    }
    */

    /**
     * Событие авторизации пользователя, для всех ролей
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        // Установка специального лайаута авторизации
        $this->layout = "@app/modules/common/views/layouts/login";

        $model = new LoginForm();

        //Ajax валидация формы авторизации
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        //Авторизация по POST
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //редирект в свой кабинет пользователя
            User::goToCabinet();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
