<?php
require_once("./factory/recordFactory.php");
require_once("./models/wallet.php");

class recordController
{
  // Menampilkan view home
  static function index()
  {
    include_once "./views/home.php";
  }

  // Menyimpan data kedalam database
  static function createRecord($data)
  {
    global $dbh;

    // Mengambil data yang di kirimkan
    $amount = $data['amount'];
    $type = $data['type'];
    $datetime = $data['datetime'];
    $description = $data['description'];
    $category = $data['category'];

    // Menyiapkan msyql query
    $sql = "INSERT INTO records (amount, type, datetime, description, category)
            VALUES ('$amount', '$type', '$datetime', '$description', '$category');";

    $stmt = $dbh->prepare($sql);

    // Mengeksekusi msyql query
    if ($stmt->execute()) {
      echo "Data inserted successfully";
    } else {
      echo "Error: ";
    }

    // Mengupdate saldo wallet berdasarkan type record
    $wallet = Wallet::getWallets();
    $balance = $wallet->getBalance();
    if ($type == "income") {
      $wallet->setCurrentBalance($balance + $amount);
    } elseif ($type == "expense") {
      $wallet->setCurrentBalance($balance - $amount);
    }

    // Mengirim notifikasi sukses
    session_start();
    $_SESSION['snackbar_message'] = "Successfully created a new $type";
    
    // Mengubah lokasi halaman dengan merubah lokasi header
    $target = "./index.php";
    header("Location: $target");
    exit();
  }


  // Mengambil semua record dari database
  public static function getRecords(): array
  {
    global $dbh;

    // menyiapkan dan menjalankan query sql
    $stmt = $dbh->prepare("SELECT * FROM records ORDER BY `datetime` DESC");
    $stmt->execute();
    $records_data = $stmt->fetchAll();

    // membuat objek record dari hasil pengambilan data record
    $records = [];
    foreach ($records_data as $key => $record_data) {
      $record = RecordFactory::createRecord($record_data);
      array_push($records, $record);
    }

    return $records;
  }
}
