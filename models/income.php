<?php

// import abstract class Record
require_once('record.php');

// Membuat child class dari class record
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
