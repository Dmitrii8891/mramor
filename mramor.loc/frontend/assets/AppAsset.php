<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use \yii\web\View;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

       'css/bootstrap.min.css',
        'css/bootstrap-theme.min.css',
        'css/style.css',
       'css/ilightbox/ilightbox.css',
        'css/ilightbox/metro-black-skin/skin.css',
    ];
    public $js = [
        'js/jquery.mCustomScrollbar.concat.min.js',
        'js/jquery.scrollbox.min.js',
        'js/script.js',
        'js/bootstrap.min.js',
        'js/ilightbox/ilightbox.packed.js',

        'js/main.js',
    ];
    public $depends = [

      'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [ 'position' => View::POS_HEAD ];
}
