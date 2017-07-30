<?php

namespace MoneyTransfer\Context;


use MoneyTransfer\Data\Account;
use MoneyTransfer\Role\MoneyDestination;
use MoneyTransfer\Role\MoneySource;

class Transfer
{

	/** @var  Account */
	private $source;

	/** @var  Account */
	private $destination;


	public function __construct(Account $source, Account $destination)
	{
		$source->extend(MoneySource::class);
		$this->source = $source;
		$destination->extend(MoneyDestination::class);
		$this->destination = $destination;
	}


	public function transferMoney($amount)
	{
		if ($this->source->getBalance() < $amount)
			throw new \Exception('Destination account has not enough money');

		$this->source->transfer($amount);
		$this->destination->transfer($amount);
	}


	/**
	 * @return Account
	 */
	public function getSource(): Account
	{
		return $this->source;
	}


	/**
	 * @return Account
	 */
	public function getDestination(): Account
	{
		return $this->destination;
	}
}