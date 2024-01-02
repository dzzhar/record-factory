<?php

// import interface record
require_once('record.php');

// create class implements record interface

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
