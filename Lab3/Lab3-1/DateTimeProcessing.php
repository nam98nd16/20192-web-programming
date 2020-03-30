<html>
  <?php
    $name = $_GET["name"];
    $day = $_GET["day"];
    $month = isset($_GET["month"]) ? $_GET["month"] : 1;
    $year = isset($_GET["year"]) ? $_GET["year"] : 1;
    $hour = $_GET["hour"];
    $min = $_GET["min"];
    $sec = $_GET["sec"];

    $day_count = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    function render_select_option($i, $selectedVal) {
      if ($i == $selectedVal) {
          echo "<option value=\"$i\" selected>$i</option>";
      } else {
          echo "<option value=\"$i\">$i</option>";
      }
  }
  ?>
<form id="form" action="DateTimeProcessing.php" method="get">
  <p>Enter your name and select date and time for the appointment</p>
  <table>
    <tr>
      <td>Your name:</td>
      <td>
        <input type="text" name="name" value="<?php echo $name ?>">
      </td>
    </tr>
    <tr>
      <td>Date:</td>
      <td>
        <select name="day">
          <?php
          for ($i = 1; $i <= $day_count; $i++) {
            render_select_option($i, $day);
          }
          ?>
        </select>
        <select name="month" onchange="submit()">
          <?php
          for ($i = 1; $i <= 12; $i++) {
            render_select_option($i, $month);
          }
          ?>
        </select>
        <select name="year" onchange="submit()">
          <?php
          for ($i = 2020; $i <= 2030; $i++) {
            render_select_option($i, $year);
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Time:</td>
      <td>
        <select name="hour">
          <?php
          for ($i = 0; $i <= 23; $i++) {
            render_select_option($i, $hour);
          }
          ?>
        </select>
        <select name="min">
          <?php
          for ($i = 0; $i <= 59; $i++) {
            render_select_option($i, $min);
          }
          ?>
        </select>
        <select name="sec">
          <?php
          for ($i = 0; $i <= 59; $i++) {
            render_select_option($i, $sec);
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right">
        <input type="submit" value="Submit" name="submitted">
      </td>
      <td align="left">
        <input type="reset" value="Reset">
      </td>
    </tr>
  </table>

  <?php if (isset($_GET["submitted"])) : ?>
    <br>
    <br>
    <div>
      Hi <?php echo $name; ?> !
      <br>
      You have choose to have an appointment on <?php echo date_format(date_create(sprintf('%s-%s-%s %s:%s:%s', $year, $month, $day, $hour, $min, $sec)), "H:i:s d/m/Y"); ?>
      <br>
      <br>
      More information
      <br>
      <br>
      In 12 hours, the time and date is <?php
                                        echo date_format(date_create(sprintf('%s-%s-%s %s:%s:%s', $year, $month, $day, ($hour + 12) % 24, $min, $sec)), "H:i:s d/m/Y");
                                        ?>
      <br>
      <br>
      This month has <?php echo $day_count; ?> days!
    </div>
  <?php endif; ?>
</form>

</html>