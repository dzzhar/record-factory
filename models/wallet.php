<?php

class Wallet
{
  private $current_balance = 0;
  private $initial_balance = 0;

  function __construct($balance)
  {
    $this->initial_balance = $balance;
    $this->current_balance = $balance;
  }

  public function getCurrentBalance()
  {
    return $this->current_balance;
  }

  public function getInitialBalance()
  {
    return $this->initial_balance;
  }

  public function setCurrentBalance($new_balance)
  {
    $this->current_balance = $new_balance;
  }

  public function increaseBalance($amount)
  {
    $this->current_balance += $amount;
  }

  public function decreaseBalance($amount){
    $this->current_balance -= $amount;
  }
}
