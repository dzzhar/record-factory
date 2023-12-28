<?php

// create interface wallet
interface Record
{
    public function addRecord();
    public function removeRecord();
    public function getAmount();
    public function setAmount();
}
