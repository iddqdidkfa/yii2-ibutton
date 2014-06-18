<?php


namespace softcommerce\ibutton;


use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class IButton extends Widget {
	public $id = null;
	public $name = null;
	public $checked = null;
	public $model = null;
	public $attribute = null;
	public $type = 'checkbox';
	public $options = [];
	public $clientOptions = [];

	public function init()
	{
		parent::init();
		Html::addCssClass($this->options, 'iButton');
		Html::addCssStyle($this->options, 'display:none');
	}

	public function run()
	{
		switch($this->type) {
			case 'checkbox':
				if (!is_null($this->model)) {
					$this->id = Html::getInputId($this->model, $this->attribute);
					echo Html::activeCheckbox($this->model, $this->attribute, $this->options);
				} else {
					echo Html::checkbox($this->name, $this->checked, $this->options);
				}
				break;
			case 'radio':
				if (!is_null($this->model)) {
					$this->id = Html::getInputId($this->model, $this->attribute);
					echo Html::activeRadio($this->model, $this->attribute, $this->options);
				} else {
					echo Html::radio($this->name, $this->checked, $this->options);
				}
				break;
			default:
				throw new Exception('Invalid element type');
		}
		$this->register();
	}

	protected function register()
	{
		$view = $this->getView();
		IButtonAsset::register($view);
		$options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
		$js = "jQuery('#{$this->id}').iButton({$options});";
		$view->registerJs($js);
	}
} 