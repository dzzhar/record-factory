<?php

require_once('./models/record.php');

function recordCard(Record $record)
{
  // Format the datetime
  $formattedDatetime = date("F j, Y, g:i a", strtotime($record->datetime));

  $type = get_class($record);

  // Determine the card color based on the type
  $cardColor = ($type == 'Income') ? '#4CAF50' : '#FF5733';

  // Output the card HTML
  echo <<<HTML
        <div style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden; margin: 20px; max-width: 300px; background-color: #fff;">
            <div style="background-color: $cardColor; color: #fff; padding: 10px; text-align: center;">
                <h2 style="margin: 0;">Transaction</h2>
            </div>
            <div style="padding: 20px;">
                <p style="margin: 0;">Amount: {$record->amount}</p>
                <p style="margin: 0;">Type: {$type}</p>
                <p style="margin: 0;">Datetime: {$record->datetime}</p>
                <p style="margin: 0;">Description: {$record->description}</p>
                <p style="margin: 0;">Category: {$record->category}</p>
            </div>
        </div>
  HTML;
}
