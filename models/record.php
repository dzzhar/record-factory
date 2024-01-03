<?php

// Membuat abstract class record
abstract class Record
{
    public $amount = 0;
    public $walletId = 0;
    public $description = "";
    public $datetime = "";
    public $category;
}
