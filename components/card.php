<?php

require_once('./models/record.php');

function recordCard(Record $record, $balance)
{
    // Format the datetime
    $formattedDatetime = date("F j, Y, g:i a", strtotime($record->datetime));

    $type = get_class($record);

    $modifier = ($type == 'Income') ? '+' : '-';

    // Output card HTML
    echo <<<HTML
        <div class="$type | transaction-card">
            <div class="card-header" style="color: #fff; padding: 10px; text-align: center;">
            </div>
            <div class="card-body">
                <div>
                    <div class="category">{$record->category}</div>
                    <span class="type">{$type}</span>
                    <div class="description">{$record->description}</div>
                    <div class="datetime">{$formattedDatetime}</div>
                </div>
                <div>
                    <div class="amount">$modifier {$record->amount}</div>
                    <div class="balance">$balance</div>
                </div>
            </div>
        </div>
  HTML;
}
