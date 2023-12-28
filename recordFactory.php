<?php

require_once('pengeluaran.php');
require_once('pemasukan.php');
require_once('transfer.php');

// create a RecordFactory class
class RecordFactory
{
    public static function createWallet($type)
    {
        // create if-else
        if ($type === "pengeluaran") {
            return new Pengeluaran();
        } elseif ($type === "pemasukan") {
            return new Pemasukan();
        } elseif ($type === "transfer") {
            return new Transfer();
        }
    }
}
