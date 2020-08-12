<?php
global $title;
$title = 'PHP Calculator';
include 'templates/header.php';
?>

  <h1><?php echo $title; ?></h1>

  <?php include 'templates/navigation.php'; ?>

  <h2>PHP Calculator Form</h2>
  <form action="calc.php" method="GET">
    <label for="num1">
      First Operand:
      <input type="number" name="num1" id="num1">
    </label>
    <label for="operator">
      Operator:
      <select name="operator" id="operator">
        <option value="add">+</option>
        <option value="subtract">-</option>
        <option value="multiply">&times;</option>
        <option value="divide">&divide;</option>
      </select>
    </label>
    <label for="num2">
      Second Operand:
      <input type="number" name="num2" id="num2">
    </label>
    <input type="submit" value="Get Result">
  </form>

<?php include 'templates/footer.php';