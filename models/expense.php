<?php

// import abstract class Record
require_once('record.php');

// create child class extends parent class
class Expense extends Record
{
    public function __construct($data)
    {
        $this->amount = $data['amount'];
        $this->description = $data['description'];
        $this->category = $data['category'];
        $this->datetime = $data['datetime'];
    }
}
