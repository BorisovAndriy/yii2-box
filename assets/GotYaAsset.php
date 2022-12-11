<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GotYaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/gotya/css/bootstrap.css',
        'themes/gotya/css/bootstrap-responsive.css',
        'themes/gotya/css/style.css',
        //'css/site.css',
    ];
    public $js = [
        '/themes/gotya/js/jquery-1.8.2.js',
        '/themes/gotya/js/bootstrap.js',
        '/themes/gotya/js/flexslider.js',
        '/themes/gotya/js/carousel.js',
        '/themes/gotya/js/jquery.cslider.js',
        '/themes/gotya/js/slider.js',
        '/themes/gotya/js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
      //  'yii\bootstrap\BootstrapAsset',
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

    /*

    <link href="/themes/gotya/css/bootstrap.css" rel="stylesheet">
    <link href="/themes/gotya/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="/themes/gotya/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>


     *
     *
     *
<script src="/themes/gotya/js/jquery-1.8.2.js"></script>
<script src="/themes/gotya/js/bootstrap.js"></script>
<script src="/themes/gotya/js/flexslider.js"></script>
<script src="/themes/gotya/js/carousel.js"></script>
<script src="/themes/gotya/js/jquery.cslider.js"></script>
<script src="/themes/gotya/js/slider.js"></script>
<script defer="defer" src="/themes/gotya/js/custom.js"></script>
     */
}
