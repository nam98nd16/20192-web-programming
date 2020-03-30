<html>

<body>
  <?php
    $name1 = isset($_POST["name1"]) ? $_POST["name1"] : "";
    isset($_POST["dateOfBirth1"]) ? ($dateOfBirth1 = $_POST["dateOfBirth1"] AND $date1 = date_create($dateOfBirth1)) : $dateOfBirth1 = '';
    $name2 = isset($_POST["name2"]) ? $_POST["name2"] : "";
    isset($_POST["dateOfBirth2"]) ? ($dateOfBirth2 = $_POST["dateOfBirth2"] AND $date2 = date_create($dateOfBirth2)) : $dateOfBirth2 = '';

  function get_days_diff($dateOfBirth1, $dateOfBirth2)
  {
    return date_diff($dateOfBirth1, $dateOfBirth2)->format("%a days");
  }

  function get_years_diff($dateOfBirth1, $dateOfBirth2)
  {
    return date_diff($dateOfBirth1, $dateOfBirth2)->format("%y years");
  }

  function display_info($name, $dob)
  {

  }
  ?>
  <form action="DateTimeFunction.php" method="post">
    <table>
      <tr>
        <td>Name 1:</td>
        <td>
          <input type="text" name="name1" value="<?php echo $name1; ?>">
        </td>
      </tr>
      <tr>
        <td>Date of birth 1:</td>
        <td>
          <input type="text" name="dateOfBirth1" value="<?php echo $dateOfBirth1; ?>">
        </td>
      </tr>
      <tr></tr>
      <tr>
        <td>Name 2:</td>
        <td>
          <input type="text" name="name2" value="<?php echo $name2; ?>">
        </td>
      </tr>
      <tr>
        <td>Date of birth 2:</td>
        <td>
          <input type="text" name="dateOfBirth2" value="<?php echo $dateOfBirth2; ?>">
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
  <br>
  <?php
  if ($name1 && $date1 && $name2 && $date2) {
    echo "<br>$name1: ", date_format($date1, 'l, F j, Y'), "-", date_diff(date_create(), $date1)->format('%y'), " years old";
    echo "<br>$name2: ", date_format($date2, 'l, F j, Y'), "-", date_diff(date_create(), $date2)->format('%y'), " years old";
    echo "<br>", abs(get_days_diff($date1, $date2)), " days diffrent";
    echo "<br>", abs(get_years_diff($date1, $date2)), " year(s) diffrent";
  }
  ?>
</body>

</html>