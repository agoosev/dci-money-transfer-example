<?php

namespace MoneyTransfer;


class Data
{

	/** @var array */
	private $availableRoles = [];


	public function extend(string $role)
	{
		$this->availableRoles[$role] = new $role();
	}


	/**
	 * @param $name      string
	 * @param $arguments array
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	function __call($name, $arguments)
	{
		$class = get_called_class();

		foreach ($this->availableRoles as $role)
		{
			if (method_exists($role, $name))
			{
				/** @var \Closure $closure */
				$closure = $role->{$name}();
				$bound = $closure->bindTo($this, $class);

				return call_user_func_array($bound, $arguments);
			}
		}

		if (empty(get_parent_class($this)))
			return parent::__call($name, $arguments);

		throw new \Exception('Method ' . $name . ' is not defined on ' . $class . ' class.');
	}


}