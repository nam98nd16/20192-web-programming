<?php session_start();
  isset($_SESSION["result"]) ? ($_SESSION["result"] = $_SESSION["result"]) : ($_SESSION["result"] = rand(0, 100));
  isset($_SESSION["count"]) ? ($_SESSION["count"]++) : ($_SESSION["count"] = 0);
  $trueCount = ceil($_SESSION["count"] / 2);
  $guess = isset($_POST["guess"]) ? $_POST["guess"] : "";
?>
<html>
  <body>
    <h1>Guess a number</h1>

    <form action="GuessANumber.php" method="post">
      <table>
        <tr>
          <td>Your guess:</td>
          <td>
            <input type="text" name="guess" value="<?php echo $guess; ?>">
          </td>
        </tr>
          <tr>
            <td>
              <?php
                if (is_numeric($guess)) {
                  if ($guess == $_SESSION["result"]) {
                    echo "You are correct!";
                    session_unset();
                  } elseif ($guess < $_SESSION["result"]) {
                    echo "Wrong. Please try a higher number. You have guessed $trueCount time!";
                  } else {
                    echo "Wrong. Please try a lower number. You have guessed $trueCount time!";
                  }
                } else {
                  echo "You must enter a number!";
                }
              ?>
            </td>
          </tr>
        <tr>
          <td align="right">
            <input type="submit" value="Submit">
          </td>
          <td align="left">
            <input type="reset" value="Reset">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>