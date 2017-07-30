<?php

namespace MoneyTransfer\Data;


use MoneyTransfer\Data;

class Account extends Data
{

	/** @var  string */
	private $name;

	/** @var  float */
	private $balance;


	public function __construct(string $name, float $balance)
	{
		$this->name = $name;
		$this->balance = $balance;
	}


	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}


	/**
	 * @return float
	 */
	public function getBalance(): float
	{
		return $this->balance;
	}


	/**
	 * @param float $amount
	 */
	public function increaseBalance(float $amount)
	{
		$this->balance += $amount;
	}


	/**
	 * @param float $amount
	 */
	public function decreaseBalance(float $amount)
	{
		$this->balance -= $amount;
	}
}