<?php
global $title;
$title = 'PHP Calculator';
include 'templates/header.php';
?>

  <h1><?php echo $title; ?></h1>

  <?php include 'templates/navigation.php'; ?>

  <?php
    // $_POST $_GET
    echo '<pre>'; // var_dump is our best friend, it outputs all the info for the variable and/or expression we pass it!
    var_dump( $_GET );
    echo '</pre>';

    // Prepare to store some warnings for the user...
    $warnings = array();

    // Check if the form fields are all submitted...
    /**
     * isset() Checks to see if a value is declared / defined at all.
     * empty() Checks to see if a value is an empty string, zero, or the array has no elements.
     */
    if ( isset( $_GET['num1'] ) && !empty( $_GET['num1'] ) ) {
      $num1 = (integer) $_GET['num1']; // We can type-cast this to a number using (integer) before the value. It does its best to convert to integer in this case.
    } else {
      $warnings[] = 'First operand is missing.'; // array_push( $warnings, 'New warning.' )
    }
    if ( isset( $_GET['operator'] ) ) {
      $operator = (string) $_GET['operator'];
    } else {
      $warnings[] = 'Operator is missing.';
    }
    if ( isset( $_GET['num2'] ) && !empty( $_GET['num2'] ) ) {
      $num2 = (integer) $_GET['num2'];
    } else {
      $warnings[] = 'Second operand is missing.';
    }

    // Make sure we have values we can use.
    if ( isset( $num1 ) && isset( $operator ) && isset( $num2 ) ) {
      switch ( $operator ) {
        case 'add':
          $result = $num1 + $num2;
          break;
        case 'subtract':
          $result = $num1 - $num2;
          break;
        case 'multiply':
          $result = $num1 * $num2;
          break;
        case 'divide':
          $result = $num1 / $num2;
          break;
      }
    }
  ?>

  <h2>PHP Calculator Form</h2>
  <form action="calc.php" method="GET">
    <?php if ( !empty( $warnings ) ) : ?>
      <ul>
        <?php foreach ( $warnings as $warning ) : ?>
          <li>
            <?php echo $warning; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
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
    <?php if ( isset( $result ) ) : ?>
      <label for="result">
        Result:
        <input type="number" value="<?php echo $result; ?>" disabled>
      </label>
    <?php endif; ?>
  </form>

<?php include 'templates/footer.php';