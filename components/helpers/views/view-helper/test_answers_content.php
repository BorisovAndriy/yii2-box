<?php
	use yii\helpers\Html;
    use \app\models\TestResultAnswer;
?>
<?php if (!empty($testAnswers)) : ?>
    <table class="table table-hover">
        <tr>
            <th style="width: 150px"></th>
            <th><?= \Yii::t('app', 'Answer') ?></th>
        </tr>
        <?php foreach ($testAnswers as $key => $answer) : ?>
            <tr>
                <td style="width: 200px">
                    <span style="width: 80px" class="label
                    <?php if ($answer->answer_result_id == 1) :?>label-success <?php else :?> label-danger <?php endif; ?>">
                        <?= \Yii::t('app', $answer->answerResult->name) ?>
                    </span>

                    <?php if (isset($testResult) && $testResult) : ?>
                        <?php $tra = TestResultAnswer::find()->where(['result_id'=>$testResult->id, 'question_id' =>$answer->question_id])->offset($key)->one() ?>
                        <span class="label
                        <?php if ($tra->answer_result_id == 1) :?>label-success <?php else :?> label-danger <?php endif; ?>">
                            <?= \Yii::t('app', $tra->answerResult->name) ?>
                        </span>
                    <?php endif;?>
                </td>
	            <td><?php echo $answer->image 
					? Html::img($answer->imageWithPath, ['style' => 'max-width:150px;max-height:150px;', 'alt' => $answer->content])
			        : $answer->content
		        ?></td>
            </tr>
        <?php endforeach;?>
    </table>
<?php endif ?>
