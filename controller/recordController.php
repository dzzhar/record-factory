<?php
require_once("./factory/recordFactory.php");


class recordController
{
  static function index()
  {
    include_once "./views/home.php";
  }

  static function createRecord($data)
  {
    RecordFactory::createRecord($data);

    global $dbh;

    // Retrieve data from the form
    $amount = $data['amount'];
    $type = $data['type'];
    $datetime = $data['datetime'];
    $description = $data['description'];
    $category = $data['category'];

    echo $amount;
    echo $type;
    echo $datetime;
    echo $description;
    echo $category;

    $sql = "INSERT INTO records (amount, type, datetime, description, category)
            VALUES ('$amount', '$type', '$datetime', '$description', '$category');";

    $stmt = $dbh->prepare($sql);

    // Execute the statement
    if ($stmt->execute()) {
      echo "Data inserted successfully";
    } else {
      echo "Error: ";
    }

    session_start();
    $_SESSION['snackbar_message'] = "Your message here";
    $target = "./index.php";
    header("Location: $target");
    exit();
  }


  public static function getRecords(): array
  {
    global $dbh;

    $stmt = $dbh->prepare("SELECT * FROM records ORDER BY `datetime` DESC");
    $stmt->execute();
    $records_data = $stmt->fetchAll();

    $records = [];
    foreach ($records_data as $key => $record_data) {
      $record = RecordFactory::createRecord($record_data);
      array_push($records, $record);
    }

    return $records;
  }
}