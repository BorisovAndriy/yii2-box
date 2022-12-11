<?php
    use \app\components\helpers\SystemHelper;
    use \app\models\AbiturientParentsType;
?>

<?php if ($abiturientParents) : ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th><?=  Yii::t('app', 'Information of parents')?></th>
                            <th><?=  Yii::t('app', 'Relation')?></th>
                            <th><?=  Yii::t('app', 'Phone number')?></th>
                            <th><?=  Yii::t('app', 'Additional phone number')?></th>
                        </tr>
                            <?php foreach ($abiturientParents as $parent) : ?>
                                <tr>
                                    <td><?= $parent['name']?></td>
                                    <td>
                                        <?php if(!empty($parent['type_id'])) : ?>
                                            <?= Yii::t('app', AbiturientParentsType::find()->where(['id' => $parent['type_id']])->one()->name)?>
                                        <?php endif ?>
                                    </td>
                                    <td><?= SystemHelper::formatPhoneNumber($parent['phone']) ?></td>
                                    <td><?= SystemHelper::formatPhoneNumber($parent['phone_other']) ?></td>
                                </tr>
                            <?php endforeach ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
<?php endif ?>