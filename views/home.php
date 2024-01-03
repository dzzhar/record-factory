<?php
session_start();

require_once('./database/database.php');

include_once("./components/card.php");

include_once('./factory/recordFactory.php');

require_once('./models/wallet.php');

// Mengambil data saldo wallet dari database
$wallet = Wallet::getWallets();

$balance = $wallet->getBalance();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style.css">

  <title>All Records</title>
</head>

<body>

  <button class="add-record-button" onclick="openModal()">+ Add Record</button>

  <!-- Form dialog start -->
  <dialog id="modalDialog" class="expense-form">
    <button onclick="closeModal()">X </button>


    <form class="" method="post" action="add_record">
      <label for="amount">Amount:</label>
      <input type="number" name="amount" required step="0.01"><br>

      <label>Type:</label>

      <div style="display:flex">
        <input type="radio" name="type" value="expense" required> Expense
        <input type="radio" name="type" value="income" required> Income<br>
      </div>

      <label for="datetime">Datetime:</label>
      <input type="datetime-local" name="datetime" required><br>

      <label for="description">Description:</label>
      <textarea name="description" rows="4" required></textarea><br>

      <label for="category">Category:</label>
      <select name="category" required>
        <option value="food">Food</option>
        <option value="clothing">Clothing</option>
        <option value="transportation">Transportation</option>
        <option value="salary">Salary</option>
      </select><br>

      <input class="submit-button" type="submit" value="Submit">
    </form>
  </dialog>
  <!-- Form dialog end -->


  <div class="wallet-card">current balance:
    <?= $balance ?>
  </div>

  <!-- menampilkan seluruh record card start -->
  <?php
  require_once('./controller/recordController.php');

  // mengambil seluruh record dari controller 
  $records = recordController::getRecords();

  // menampilkan seluruh record dari array records
  foreach ($records as $key => $record) {
    if (get_class($record) == "Income") {
      $balance -= $record->amount;
    } else {
      $balance += $record->amount;
    }

    // merender record card
    recordCard($record, $balance);
  }
  ?>
  <!-- menampilkan seluruh record end -->


  <script>
    // fungsi untuk membuka modal dialog
    function openModal() {
      document.getElementById("modalDialog").showModal();
    }

    // fungsi untuk menutup modal dialog
    function closeModal() {
      document.getElementById("modalDialog").close();
    }
  </script>
</body>

</html>


<?php
// Memunculkan alert sukses setelah menambahkan record
if (isset($_SESSION['snackbar_message'])) {
  $snackbarMessage = $_SESSION['snackbar_message'];
  unset($_SESSION['snackbar_message']);
  echo "<script>alert('$snackbarMessage');</script>";
}
