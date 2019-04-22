<pre>
<?php

class Well {
	public $waterLevel;
	public $digLevel;
	
	public function __construct($waterLevel, $digLevel) {
		$this->waterLevel = $waterLevel;
		$this->digLevel = $digLevel;
	}
	
	public function drawWater() {
		$this->waterLevel -= 10;
	}

	public function digWell() {
		$this->digLevel += 10;
	}
}

class WellPlugin {
	public function afterDrawWater($object) {
		if ($object->waterLevel < 25) {
			$object->lightTheLamp();
		}
	}
}

class WellPluginTwo {
	public function afterDigWell($object) {
		if ($object->digLevel < 100) {
			$object->stopDig();
		}
	}
}

class WellInterceptor extends Well {
	public $lampIsOn = false;
	public $lampDepthLevel = false;
	protected $plugin;
	protected $pluginTwo;

	public function __construct($waterLevel, $digLevel) {
		parent::__construct($waterLevel, $digLevel);
		$this->plugin = new WellPlugin();
		$this->pluginTwo = new WellPluginTwo();
	}
	
	public function digWell() {
		$result = parent::digWell();
		$this->pluginTwo->afterDigWell($this);
	}
	
	public function drawWater() {
		$result = parent::drawWater();
		$this->plugin->afterDrawWater($this);
	}

	public function lightTheLamp() {
		$this->lampIsOn = true;
	}

	public function stopDig() {
		$this->lampDepthLevel = true;
	}
}

$well = new WellInterceptor(100,100);

function drawWaterFromWell(Well $well) {
	return $well->drawWater();
}

function depthDigWellLevel(Well $well) {
	return $well->digWell();
}


depthDigWellLevel($well);
drawWaterFromWell($well);
drawWaterFromWell($well);
drawWaterFromWell($well);
drawWaterFromWell($well);
drawWaterFromWell($well);
drawWaterFromWell($well);
drawWaterFromWell($well);
drawWaterFromWell($well);
drawWaterFromWell($well);

var_dump($well);
