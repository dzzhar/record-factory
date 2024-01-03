<?php

// import abstract class Record
require_once('record.php');

// create child class extends parent class
class Income extends Record
{
    public function __construct($data)
    {
        $this->amount = $data['amount'];
        $this->description = $data['description'];
        $this->datetime = $data['datetime'];
        $this->category = $data['category'];
    }
}
