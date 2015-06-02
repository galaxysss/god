<?php
namespace cs\assets;

use yii\web\AssetBundle;

class ClearJuiJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-ui';
    public $js = [
        'jquery-ui.js',
    ];
    public $css = [

    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}