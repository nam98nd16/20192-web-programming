<html>

<head>
  <title> Receiving Input </title>
</head>

<body>
  <font size=5>Thank You: Got Your Input.</font>
  <?php
  $email = $_POST["email"];
  $username = $_POST["username"];
  $class = $_POST["class"];
  $university = $_POST["university"];
  $chess = $_POST["chess"];
  $games = $_POST["games"];
  $music = $_POST["music"];
  $phone = $_POST["phone"];
  $hobbies = array();
  if ($chess == "chess") array_push($hobbies, $chess);
  if ($games == "games") array_push($hobbies, $games);
  if ($music == "music") array_push($hobbies, $music);
  $smrtphone = $_POST["smrtphone"];

  print("<br>Hello, $username");

  print("<br>You're studying at $class, $university");

  if (empty($hobbies))
    print("<br>You have no hobbies!");
  else {
    print("<br>Your hobbies are:");
    foreach($hobbies as $i => $hobby) {
      echo "<br>" .($i+1), ". $hobby";
    }
  }

  print("<br>Your email address is $email");

  print("<br>Your phone number is $phone");

  print("<br>Your smartphone is $smrtphone");
  ?>

</html>