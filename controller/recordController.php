<?php
require_once("./factory/recordFactory.php");


class recordController
{
  static function index()
  {
    // do something
  }

  static function createRecord($data)
  {
    RecordFactory::createRecord($data);

    session_start();
    $_SESSION['snackbar_message'] = "Your message here";
    $target = "./index.php";
    header("Location: $target");
    exit();
  }

  
  public static function getRecords(): array
  {
      global $dbh;

      $stmt = $dbh->prepare("SELECT * FROM records");
      $stmt->execute();
      $records_data = $stmt->fetchAll();

      // this code is implemented on the index controller
      // if implementation mvc architecture 
      // and return the list of records

      $records = [];
      foreach ($records_data as $key => $record_data) {
          $record = RecordFactory::createRecord($record_data);
          array_push($records, $record);
      }

      return $records;
  }
}
