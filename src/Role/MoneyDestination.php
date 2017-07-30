<?php

namespace MoneyTransfer\Role;


/**
 * @method increaseBalance(float $amount)
 */
class MoneyDestination
{
	public function transfer()
	{
		return function (float $amount)
		{
			$this->increaseBalance($amount);
		};
	}
}