<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        /*
        '/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css',
        '/AdminLTE/bower_components/Ionicons/css/ionicons.min.css',
        '/AdminLTE/dist/css/AdminLTE.min.css',
        '/AdminLTE/plugins/iCheck/square/blue.css',
        */
        'css/site.css',
    ];
    public $js = [
       // '/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js',
       // '/AdminLTE/plugins/iCheck/icheck.min.js',
    ];
    public $depends = [
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
