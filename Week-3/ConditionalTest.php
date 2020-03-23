<html>
  <head>
    <title> Conditional Test</title>
  </head>
  <body>
    <?php
      $first = $_GET["firstName"]; $middle=$_GET["middleName"]; $last=$_GET["lastName"];
      print ("Hi $first! Your full name is $last $middle $first. <br></br>");
    ?>
  </body>
</html>