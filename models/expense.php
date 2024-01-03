<?php

// import abstract class Record
require_once('record.php');

// Membuat child class dari class record
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
