<?php

require_once "./database/database.php";

class Wallet
{
  private $balance = 0;
  private $initial_balance = 0;

  function __construct($balance)
  {
    $this->initial_balance = $balance;
    $this->balance = $balance;
  }

  public function getBalance()
  {
    return $this->balance;
  }

  public function getInitialBalance()
  {
    return $this->initial_balance;
  }

  public function setCurrentBalance($new_balance)
  {
    global $dbh;
    $stmt = $dbh->prepare("UPDATE `wallets` SET `amount` = '$new_balance' WHERE `wallets`.`id` = 1");
    $stmt->execute();
    $this->balance = $new_balance;
  }

  static public function getWallets(): Wallet{
    global $dbh;

    $stmt = $dbh->prepare("SELECT * FROM wallets LIMIT 1");
    $stmt->execute();
    $wallet_data = $stmt->fetch();

    $wallet = new Wallet($wallet_data['amount']);

    return $wallet;
  }
}
