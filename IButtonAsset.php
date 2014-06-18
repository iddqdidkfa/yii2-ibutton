<?php


namespace softcommerce\ibutton;


use yii\web\AssetBundle;

class IButtonAsset extends AssetBundle {
	public $sourcePath = '@vendor/softcommerce/yii2-ibutton/assets';
	public $css = ['css/jquery.ibutton.min.css'];
	public $js = ['js/jquery.ibutton.min.js'];

	public $depends = [
		'yii\web\JqueryAsset',
	];
} 