<?php
namespace app\assets;

use yii\web\AssetBundle;
class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
      //  'datatables/dataTables.bootstrap.min.js',
        // more plugin Js here
    ];
    public $css = [
    //    'datatables/dataTables.bootstrap.css',
        '/css/site.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];


    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];

    public $cssOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];


    public $publishOptions = [
        'forceCopy' => true
    ];
}