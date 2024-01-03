<?php

require_once('./database/database.php');

require_once('./models/expense.php');
require_once('./models/income.php');

// create a RecordFactory class
class RecordFactory
{
    public static function createRecord($data)
    {
        $type = $data['type'];
        // create if-else
        if ($type === "expense") {
            return new Expense($data);
        } elseif ($type === "income") {
            return new Income($data);
        }
    }
}
