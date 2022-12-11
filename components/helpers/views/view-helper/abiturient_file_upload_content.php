<?php
use \app\components\services\AttachmentService;
?>

<?php if ($initialPreview) : ?>
    <?php  foreach ($initialPreview as $key  => $ip ) : ?>
        <div class="file-preview-frame krajee-default  file-preview-initial file-sortable kv-preview-thumb" data-fileindex="init_0" data-template="image"><div class="kv-file-content">
            <img src="<?= $ip ?>" class="file-preview-image kv-preview-data"
                 title= "<?= $initialPreviewConfig[$key]['caption'] ?>"
                 alt="<?= $initialPreviewConfig[$key]['caption'] ?>"
                 style="width: auto; height: auto; max-width: 100%; max-height: 100%;"
            >
            </div><div class="file-thumbnail-footer">
                <div class="file-footer-caption" title="<?= $initialPreviewConfig[$key]['caption'] ?>">
                    <div class="file-caption-info"><?= $initialPreviewConfig[$key]['caption'] ?></div>
                    <div class="file-size-info"> <samp>(<?= AttachmentService::getSize($initialPreviewConfig[$key]['size']) ?> KB)</samp>
                        <a title="<?= Yii::t('app', 'Download')?>" href="<?= $initialPreviewConfig[$key]['downloadUrl'] ?>" class="btn btn-xs btn-default" target="_blank"><span class="glyphicon glyphicon-download-alt"></span> </a>
                        <a title="<?= Yii::t('app', 'Remove file')?>" href="<?= $initialPreviewConfig[$key]['url'] ?>" class="btn btn-xs btn-default" ><span class="glyphicon glyphicon-trash"></span> </a>
                    </div>
                    <div class="file-size-info"> </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php endforeach;?>
<?php endif;?>

<style>
    .file-preview-image {
        font: 12px sans-serif;
        color: black;
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 160px;
        height: 15px;
        margin: auto;
    }

    .file-drag-handle{
        display: none;
    }

    .krajee-default .file-caption-info, .krajee-default .file-size-info {
        height: 30px;
    }
</style>