<?php

namespace MoneyTransfer\Role;

/**
 * @method decreaseBalance(float $amount)
 */
class MoneySource
{

	public function transfer()
	{
		return function (float $amount) {
			$this->decreaseBalance($amount);
		};
	}
}