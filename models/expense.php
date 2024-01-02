<?php

// import interface record
require_once('record.php');

// create class implements record interface
class Expense extends Record
{
    public function __construct($data)
    {
        $this->amount = $data['amount'];
        // $this->walletId = $data['walletId'];
        $this->description = $data['description'];
        $this->category = $data['category'];
        $this->datetime = $data['datetime'];
    }
}
