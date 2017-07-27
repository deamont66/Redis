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
 * @method  bfSave()
 * @method  config_get(string $parameter)
 * @method  config_set(string $parameter, string $value)
 * @method  config_resetStat(string $parameter, string $value)
 * @method  debug_object(string $key)
 * @method  debug_segfault()
 * @method  monitor()
 * @method  pUnsubscribe(string $pattern1, string $pattern2 = NULL)
 * @method  quit()
 * @method  shutdown(string $save = "SAVE")
 * @method  sync()
 * @method  unsubscribe(string $channel1, string $channel2 = NULL)
 * @method  zInterStore(string $destination, $numkeys, string $key1, string $key2 = NULL, $option1 = NULL, $option2 = NULL)
 * @method  zRang(string $key, string $member)
 * @method  zRevRang(string $key, string $member)
 * @method  zUnionStore(string $destination, string $numkeys, string $key1, string $key2 = NULL, $option1 = NULL, $option2 = NULL)
 */
class PhpRedisDriver extends \Redis implements Kdyby\Redis\IRedisDriver
{

	/**
	 * {@inheritdoc}
	 */
	public function connect($host, $port = 6379, $timeout = 0, $reserved = null, $retry_interval = 0)
	{
		$args = func_get_args();
		return call_user_func_array('parent::connect', $args);
	}


	/**
	 * {@inheritdoc}
	 */
	public function select($database)
	{
		$args = func_get_args();
		return call_user_func_array('parent::select', $args);
	}


	/**
	 * {@inheritdoc}
	 */
	public function script($command, $script = NULL)
	{
		$args = func_get_args();
		return call_user_func_array('parent::script', $args);
	}


	/**
	 * {@inheritdoc}
	 */
	public function evalsha($scriptSha, $argsArray = [], $numKeys = 0)
	{
		$args = func_get_args();
		return call_user_func_array('parent::evalsha', $args);
	}

	/**
	 * A method to determine if a phpredis object thinks it's connected to a server
	 *
	 * @return bool
	 */
	function isConnected()
	{
		return call_user_func('parent::isConnected');
	}

	public function __call($name, $arguments)
	{
		return call_user_func_array('parent:' . $name, $arguments);
	}
}
