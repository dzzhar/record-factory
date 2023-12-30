<?php
session_start();

require_once('./database/database.php');

include_once("./components/card.php");

include_once('./factory/recordFactory.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style.css">

  <title>All Records</title>

  <style>
    /* Style for the submit button */
    .submit-button {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <button onclick="openModal()">Add Record</button>

  <dialog id="modalDialog">
    <button onclick="closeModal()">X </button>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="amount">Amount:</label>
      <input type="number" name="amount" required step="0.01"><br>

      <label>Type:</label>
      <input type="radio" name="type" value="expense" required> Expense
      <input type="radio" name="type" value="income" required> Income<br>

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
        <!-- Add more categories as needed -->
      </select><br>

      <input class="submit-button" type="submit" value="Submit">
    </form>
  </dialog>

  <div class="wallet-card">current balance: 820.00</div>

  <?php
  require_once('./controller/recordController.php');
  $records = recordController::getRecords();

  $balance = 820.00;

  // // if the balance on every record is on the top
  // // the balance represents after record
  // foreach ($records as $key => $record) {
  //   $balance = number_format($balance, 2);
  //   recordCard($record, $balance);
  
  //   if (get_class($record) == "Income"){
  //     $balance -= $record->amount;
  //   } else{
  //     $balance += $record->amount;
  //   }
  // }
  
  // if the balance on every record is on the bottom
  // the balance represents before record
  foreach ($records as $key => $record) {
    if (get_class($record) == "Income") {
      $balance -= $record->amount;
    } else {
      $balance += $record->amount;
    }

    $balance = number_format($balance, 2);
    recordCard($record, $balance);
  }
  ?>





  <script>
    // Function to open the modal
    function openModal() {
      // Show the dialog
      document.getElementById("modalDialog").showModal();
    }

    // Function to close the modal
    function closeModal() {
      // Close the dialog
      document.getElementById("modalDialog").close();
    }
  </script>
</body>

</html>


<?php
if (isset($_SESSION['snackbar_message'])) {
  $snackbarMessage = $_SESSION['snackbar_message'];
  unset($_SESSION['snackbar_message']);
  echo "<script>alert('$snackbarMessage');</script>";
}
