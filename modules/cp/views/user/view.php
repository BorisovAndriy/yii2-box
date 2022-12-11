<?php

use kartik\detail\DetailView;
use app\components\helpers\TransliteratorHelper;
use \app\models\UserRole;
use \yii\helpers\ArrayHelper;
use \app\models\UserStatus;
use \app\components\helpers\DateTimeHelper;
use \kartik\datecontrol\DateControl;
use \app\components\helpers\BreadcrumbsHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */


?>
<div class="user-view">

    <?php if($model->getErrors()) : ?>
        <div class="callout callout-danger">
            <h4><?= Yii::t('app', 'Errors') ?></h4>
            <?php foreach ($model->getErrors() as $error) : ?>
                <p><?= $error[0] ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=> $mode,
        'hAlign' => DetailView::ALIGN_LEFT,
        'panelCssPrefix' => 'box box-',
        'panel'=>[
            'heading'=> BreadcrumbsHelper::getLast()['name'],
            'type'=>DetailView::TYPE_PRIMARY ,
            'cssPrefix' => 'box box-'
        ],
        'buttons1'=>'{update}',
        'attributes' => [
            [
                'attribute'=>'id',
                'displayOnly'=>true,
                'type'=>DetailView::INPUT_TEXT,
            ],
            [
                'attribute'=>'role_id',
                'label' => Yii::t('app', 'Role'),
                'value'=> !$model->isNewRecord ? Yii::t('app', $model->role->name) : null, //string value (modo view)
                'type'=>DetailView::INPUT_SELECT2,
                'widgetOptions'=>[
                    'data'=> TransliteratorHelper::translateArray(ArrayHelper::map(UserRole::find()->orderBy('name')->all(), 'id', 'name')), //array value for input (mode update)
                    'options'=>[
                        'placeholder'=>'Select ...',
                        'value'=> (!$model->isNewRecord ? $model->role_id : 6), //установка дефолтного значения роли в режиме создания
                    ],
                    'pluginOptions'=>[
                    ]
                ],
            ],


            'email:email',
            'username',
            [
                'attribute'=>'new_password',
                'type'=>DetailView::INPUT_PASSWORD,
                'rowOptions' => ['class' => 'kv-view-hidden'],
            ],
            [
                'attribute'=>'status_id',
                'label' => Yii::t('app', 'Status'),
                'value' => !$model->isNewRecord ? Yii::t('app', $model->status->name) : null, //string value (modo view)
                'type'=>DetailView::INPUT_SELECT2,
                'widgetOptions'=>[
                    'data'=> TransliteratorHelper::translateArray(ArrayHelper::map(UserStatus::find()->orderBy('name')->all(), 'id', 'name')), //array value for input (mode update)
                    'options'=>[
                            'placeholder'=>'Select ...',
                            'value'=> (!$model->isNewRecord ? $model->status_id : 1), //установка дефолтного значения статуса в режиме создания
                        ],
                    'pluginOptions'=>[
                    ]
                ],
            ],
            [
                'attribute'=>'created_at',
                'type'=>DetailView::INPUT_TEXT,
                'displayOnly'=>true,
                'value' => DateTimeHelper::convertTo($model->created_at, DateTimeHelper::FORMAT_HUMAN_DATETIME, Yii::$app->params['timeZone'])
            ],
            [
                'attribute'=>'updated_at',
                'type'=>DetailView::INPUT_TEXT,
                'displayOnly'=>true,
                'value' => DateTimeHelper::convertTo($model->updated_at, DateTimeHelper::FORMAT_HUMAN_DATETIME, Yii::$app->params['timeZone'])
            ],
        ],
    ]) ?>

</div>
