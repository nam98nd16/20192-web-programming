<html lang="en" dir="ltr">

<body>
  <?php
  $mode = isset($_GET["mode"]) ? $_GET['mode'] : 0;
  $value = isset($_GET["value"]) ? $_GET['value'] : 0;

  function degToRad($val)
  {
    return deg2rad($val);
  }

  function radToDeg($val)
  {
    return rad2deg($val);
  }

  $result = is_numeric($value) ? ($mode == 1 ? degToRad($value) : radToDeg($value)) : "";
  ?>
  <h1>Rad <-> Deg Converter</h1>
  <form action="DegreeConverter.php" method="get">
    <table>
      <tr>
        <td>
          <input type="radio" name="mode" value="0"> rad2deg
          <input type="radio" name="mode" value="1"> deg2rad
        </td>
      </tr>
      <tr>
        <td>Enter value:</td>
        <td>
          <input type="text" name="value" value="<?php echo $value ?>">
        </td>
      </tr>
      <tr>
        <td>Result:</td>
        <td><?php echo $result ?></td>
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