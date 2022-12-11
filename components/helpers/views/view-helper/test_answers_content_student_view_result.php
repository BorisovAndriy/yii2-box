<?php
    use \app\models\TestResultAnswer;
use \app\components\services\TestService;
use \yii\helpers\Html;

    $module = $this->context->module;
?>

<?php if (!empty($testAnswers)) : ?>
    <table class="table table-hover">
        <tr>
            <!--
            <th style="width: 150px"><?= \Yii::t('app', 'Try answer') ?></th>
            <th style="width: 150px"><?= \Yii::t('app', 'Student answer') ?></th>
            -->
            <th><?= \Yii::t('app', 'Answer variant') ?></th>
        </tr>
        <?php foreach ($testAnswers as $key => $answer): ?>
            <tr>
                <td colspan="3"><?=\Yii::t('app', 'Answer №').' '.($key+1) ?></td>
            </tr>

            <?php $answers = TestResultAnswer::find()->joinWith('answer')->where(['result_id'=>$testResult->id, 'test_answer.question_id' =>$answer->question_id])->indexBy('answer_id')->all() ?>
            <tr class="<?=isset($answers[$answer->id])?($answer->answer_result_id==1?'success':'danger'):'' ?>">
                <td><?=$answer->image ? Html::img($answer->imageWithPath, ['alt' => $answer->content]) : $answer->content ?></td>
            </tr>
        <?php endforeach;?>
    </table>
<?php endif ?>

<div class="row col-md-12 text-center">
<ul class="pagination">
    <?php if ($prevQuestionNumber): ?>
        <li>
            <?= Html::a(Yii::t('app', 'Prev'), ($module->id=='student'?'/student/test/view-result/':'/cp/test-result/view/').$testResult->id.'/'.$prevQuestionNumber)?>
        </li>
    <?php endif; ?>
    <?php foreach (TestService::getQuestionIds($testResult) as $key => $id) : ?>
            <?php $answerResult = TestService::checkQuestionAnswer($testResult, $id) ?>
            <?php $options = $answerResult===false || !empty($answerResult) ? ['class' => 'has-fail'] : [] ?>
            <?php $options = ($questionNumber == $key) ? ['class' => 'active'] : $options ?>
            <?php //$options = ($questionNumber == $key && $hasFail) ? ['class' => 'active has-fail'] : $options ?>
            <li><?= Html::a($key, ($module->id=='student'?'/student/test/view-result/':'/cp/test-result/view/').$testResult->id.'/'.$key, $options)?></li>
    <?php endforeach;?>
    <?php if($nextQuestionNumber) : ?>
        <li>
            <?= Html::a(Yii::t('app', 'Next'), ($module->id=='student'?'/student/test/view-result/':'/cp/test-result/view/').$testResult->id.'/'.$nextQuestionNumber)?>
        </li>
    <?php endif;?>
</ul>
</div>
<?php if ($module->id == 'student'): ?><div class="row col-md-12 text-center">
    <div class="col-md-4"><?= Html::a(Yii::t('app', 'Return to main page'), \yii\helpers\Url::to(['/student/test']), ['class' => 'btn btn-default'])?></div>
    <div class="col-md-4"><?php if (\app\models\TestResultAppeal::findOne(['test_result_id' => $testResult->id]) === null): ?>
	    <?= Html::a(Yii::t('app', 'Appeal questions or answers'), \yii\helpers\Url::to(['/student/test-result/appeal', 'id' => $testResult->id]), ['class' => 'btn btn-default'])?>
	<?php else: ?>
		<span><?=Yii::t('app', 'Appeal already sent') ?></span>
    <?php endif; ?></div>
    <div class="col-md-4"><?= Html::a(Yii::t('app', 'Return to test page'), \yii\helpers\Url::to(['/student/test-result/view?id='.$testResult->id]), ['class' => 'btn btn-default'])?></div>
</div><?php endif; ?>


<style>
    tr.success{
        border: 1px #00a65a solid;
    }
    tr.danger{
        border: 1px  red solid;
    }
</style>

<style>
    .multiple-input-list__btn{
        display: none!important;
    }

    /*
    .pagination > li > a{
        border: 1px solid #00a65a!important;
    }
    */

    .pagination > li > a.has-fail {
        font-size: large;
        border: 1px solid #dd4b39!important;
        margin-top: -3px;
    }

    .pagination > li > a.active {
        font-size: x-large;
        color: #f39c12!important;
        border: 1px solid #ddd;
        margin-top: -6px;
    }
</style>