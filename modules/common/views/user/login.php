
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">
        <nobr><?= Yii::t('app','Authorization')?></nobr>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= Yii::t('app','Enter your login and password') ?></p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',

        ]); ?>
            <?= $form->field($model, 'username')->textInput(["placeholder" => $model->getAttributeLabel('username')]) ?>
            <?= $form->field($model, 'password')->passwordInput(["placeholder" => $model->getAttributeLabel('password')]) ?>
            <div class="row">
                <div class="col-xs-8">
                    <?= $form->field($model, 'rememberMe')->checkbox([]) ?>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton(Yii::t('app','Sign In'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                </div>
                <!-- /.col -->
            </div>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div>