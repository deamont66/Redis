<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Kdyby\Redis\Driver;

use Kdyby;
use Nette;

/**
 * @author Filip Procházka <filip@prochazka.su>
 *
 */
class PhpRedisDriver extends \Redis implements Kdyby\Redis\IRedisDriver
{
	public function __call($name, $arguments)
	{
		return call_user_func_array('parent:' . $name, $arguments);
	}
}
