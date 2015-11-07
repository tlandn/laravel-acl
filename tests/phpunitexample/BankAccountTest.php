<?php
require_once 'BankAccount.php';

class BankAccountTest extends PHPUnit_Framework_TestCase {
    /** @var BankAccount */
    protected $_account;

    protected function setUp()
    {
        $this->_account = new BankAccount();
    }

    public function testBalanceIsZeroWhenOpeningAccount() {
        $this->assertEquals(0, $this->_account->getBalance());
    }

    public function testDepositIncreasesBalance() {
        $this->_account->deposit(100);
        $this->assertEquals(100, $this->_account->getBalance());
    }

    public function testWithdrawDecreasesBalance() {
        $this->_account->withdraw(100);
        $this->assertEquals(-100, $this->_account->getBalance());
    }

    /**
     * @expectedException Exception
     */
    public function testDepositNegativeAmountThrowsException() {
        $this->_account->deposit(-200);
    }
}