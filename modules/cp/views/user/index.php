<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use \yii\helpers\ArrayHelper;
use \app\models\UserRole;
use \kartik\select2\Select2;
use \app\models\UserStatus;
use app\components\helpers\TransliteratorHelper;
use \kartik\icons\Icon;

/*
Icon::map($this);
*/

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


//$this->title = Yii::t('app', 'Users');
//$this->params['breadcrumbs'][] = $this->title;

/*
echo  Icon::map($this, Icon::EL);
echo Icon::show('user', ['class'=>'fa-2x', 'framework' => Icon::FAS]);
echo Icon::show('user', ['class'=>'fa-2x', 'framework' => Icon::FAS]);
*/
?>

<div class="user-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover'=>true,
        'responsive'=>true,
        'panelPrefix' => 'box box-', //подмена на стили темы
        'resizableColumns'=>true,
        'toolbar'=> [
            ['content'=>
                Html::a(Icon::show('plus', [], Icon::FA),    ['/cp/user/create/'], ['type'=>'button', 'title'=>Yii::t('app', 'Create'), 'class'=>'btn btn-primary']).
                Html::a(Icon::show('retweet', [], Icon::FA),   ['/cp/user'] , ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Refresh')])
            ],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title">'. Icon::show('users', ['class'=>'fa-2x', 'framework' => Icon::FAS]) . Yii::t('app', \app\components\helpers\BreadcrumbsHelper::getLast()['name']) .'</h3>',
            'type'=>GridView::TYPE_PRIMARY,
            'after' => false,
            //'footer' => false
        ],

        'columns' => [
            [
                'attribute' => 'id',
                'width' => '150px'
            ],
            'email:email',
            'username',
            [
                'attribute' => 'role_id',

                'label' => Yii::t('app', 'Role'),
                'value' => function($model){
                    return Yii::t('app', $model->role->name);
                },
                'filter' => Select2::widget([
                    'name' => 'UserSearch[role_id]',
                    'data' => TransliteratorHelper::translateArray(ArrayHelper::map(UserRole::find()->orderBy('name')->all(), 'id', 'name')),
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'hideSearch' => false,
                    'value' => !empty(Yii::$app->request->get('UserSearch')['role_id']) ? Yii::$app->request->get('UserSearch')['role_id'] : null,
                    'options' => [
                        'placeholder' => Yii::t('app', 'Select').'...'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]),
            ],
            [
                'attribute' => 'status_id',

                'label' => Yii::t('app', 'Status'),
                'value' => function($model){
                    return Yii::t('app', $model->status->name);
                },
                'filter' => Select2::widget([
                    'name' => 'UserSearch[status_id]',
                    'data' => TransliteratorHelper::translateArray(ArrayHelper::map(UserStatus::find()->orderBy('name')->all(), 'id', 'name')),
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'hideSearch' => false,
                    'value' => !empty(Yii::$app->request->get('UserSearch')['status_id']) ? Yii::$app->request->get('UserSearch')['status_id'] : null,
                    'options' => [
                        'placeholder' => Yii::t('app', 'Select').'...'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]),
            ],

            [
                'class' => '\kartik\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => function () {
                        return true;
                    },
                    'delete' => function () {
                        return false;
                    },
                    'update' => function () {
                        return true;
                    }
                ]
            ],
        ],
    ]); ?>
</div>

