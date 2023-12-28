<?php

require_once('recordFactory.php');

// create an object
$record1 = RecordFactory::createWallet("pengeluaran");
$record1->addRecord();

$record2 = RecordFactory::createWallet('pemasukan');
$record2->getAmount();

$record3 = RecordFactory::createWallet('transfer');
$record3->setAmount();
