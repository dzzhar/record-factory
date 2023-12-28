<?php

// import interface record
require_once('record.php');

// create class implements record interface
class Pemasukan implements Record
{
    function addRecord()
    {
        echo "Berhasil Menambahkan\n";
    }

    function removeRecord()
    {
        echo "Berhasil Menghapus\n";
    }

    function getAmount()
    {
        echo "Berhasil Mengambil\n";
    }

    function setAmount()
    {
        echo "Berhasil Mengatur\n";
    }
}
