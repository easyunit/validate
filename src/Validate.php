<?php

namespace Easyunit;

use Easyunit\Components\Validate\SimpleValidate;
use Easyunit\Components\Singleton\SingletonTrait;
use Easyunit\Components\Singleton\SingletonInterface;

class Validate implements SingletonInterface
{
	use SingletonTrait;
	public function driver()
	{
		$this->instance = new SimpleValidate();
	}
}
