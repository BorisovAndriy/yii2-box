
<?php $socialStatus = \app\models\AbiturientRefSocialStatus::find()->where(['abiturient_id' => $abiturientId])->all()?>

<?php if (!empty($socialStatus)) : ?>
    <?php foreach ($socialStatus as $status) : ?>
        <?= Yii::t('app', $status->status->name)?><?php if ($status != end($socialStatus)) : ?>,<?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

