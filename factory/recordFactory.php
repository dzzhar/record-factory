<?php

require_once('./database/database.php');

require_once('./models/expense.php');
require_once('./models/income.php');

// Membuat class RecordFactory
class RecordFactory
{
    // Membuat objek dari class record
    public static function createRecord($data)
    {
        $type = $data['type'];
        
        // Membuat objek record berdasarkan type
        if ($type === "expense") {
            return new Expense($data);
        } elseif ($type === "income") {
            return new Income($data);
        }
    }
}
