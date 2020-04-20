<?php
?>
<html>
  <body>
    <h1>Category Adminstration</h1>
    <hr>
    <form action="admin.php" method="POST">
      <?php
        $server = '127.0.0.1';
        $user = 'root';
        $mydb = 'business_service';
        $table_name = 'Categories';
        $mysqli = new mysqli($server, $user, null, $mydb);
        if ($mysqli->connect_errno) {
          die ("Cannot connect to $server using $user");
          exit();
        } else {
          if (isset($_POST['catID'])) {
            $catID = $_POST['catID'];
            if (strlen($catID) > 0) {
              $description = $_POST['description'];
              $title = $_POST['title'];
              $updateQuery = "INSERT INTO $table_name VALUES('$catID', '$title', '$description')";
              if (!$mysqli->query($updateQuery)) {
                echo "Unable to add new category";
              }
            }
          }

          $SQLcmd = "SELECT * FROM $table_name";
          $mysqli->select_db($mydb);
          $results = $mysqli->query($SQLcmd);
          if ($results){
            print '<table>';
            print '<th>Cat ID<th>Title<th>Description';
            while($row = mysqli_fetch_row($results)) {
              print "<tr>";
              foreach($row as $field) {
                print "<td>$field</td>";
              }
              print "<tr/>";
            }
          } else {
            die ("Query Failed, SQLcmd=$SQLcmd");
          }
        }
      ?>
      <tr>
        <td><input type="text" name="catID"></td>
        <td><input type="text" name="title"></td>
        <td><input type="text" name="description"></td>
      </tr>
      <tr>
        <td><input type="submit" value="Add Category"></td>
      </tr>
      <?php
        $mysqli->close();
      ?>
    </form>
  </body>
</html>