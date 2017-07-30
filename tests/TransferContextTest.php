<?php

namespace Tests;


use MoneyTransfer\Context\Transfer;
use MoneyTransfer\Data\Account;
use PHPUnit\Framework\TestCase;

class TransferContextTest extends TestCase
{

	public function testTransfer()
	{
		$transferContext = $this->getTransferContext();
		$transferContext->transferMoney(50.5);

		$this->assertEquals(100, $transferContext->getSource()->getBalance());
		$this->assertEquals(300.5, $transferContext->getDestination()->getBalance());
	}


	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage Destination account has not enough money
	 */
	public function testNotEnoughMoney()
	{
		$transferContext = $this->getTransferContext();
		$transferContext->transferMoney(300);
	}


	/**
	 * @return Transfer
	 */
	private function getTransferContext(): Transfer
	{
		$sourceAccount      = new Account("John Smith", 150.5);
		$destinationAccount = new Account("Mary Jane", 250);
		$transferContext    = new Transfer($sourceAccount, $destinationAccount);
		return $transferContext;
	}
}