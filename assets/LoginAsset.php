<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 11/18/2020
 * Time: 3:11 PM
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/validation.css',
        'css/utilities.css',
        'css/login.css',
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',

    ];
    public $js = [


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
