<?php
require_once('./controller/recordController.php');
?>

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

    <input type="submit" value="Submit">
</form>
