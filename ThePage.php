<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "budokai4";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM characters";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  if (empty($_POST["selection"])) {
      $selection = "Select 1-9";

    } else {
      $selection = $_POST["selection"];
      $_SESSION['selection'] = $selection;
    }
}
else{
  $selection = "placeholder";
  $_SESSION['selection'] = $selection;
}


?>


<?php
$truevalue = "SELECT name, color, avatar, bio from characters WHERE id = $selection";
$trueresult = $conn->query($truevalue);
if($selection == "placeholder"){
  $bgcolor = "beige";
  echo "<body style='background-color: $bgcolor'>";
  $selecttext = "placeholder";
  echo '<div class="nametext">' .$selecttext. '</div>';
  $showimage = "placeholder.png";
  echo '<div class="Avatar"><img src="sprites/'.$showimage. '"></div>';
  $biotext = "placeholder";
  echo '<div class="biotext">' .$biotext. '</div>';
}
else{
  if ($trueresult->num_rows > 0){
    while($truerow = $trueresult->fetch_assoc()) {
      $bgcolor = $truerow["color"];
      echo "<body style='background-color: $bgcolor'>";
      $selecttext = $truerow["name"];
      echo '<div class="nametext">' .$selecttext. '</div>';
      $showimage = $truerow["avatar"];
      echo '<div class="Avatar"><img src="sprites/'.$showimage. '"></div>';
      $biotext = $truerow["bio"];
      echo '<div class="biotext">' .$biotext. '</div>';
  }
}
  else {
    echo "0 results";
  }
}

echo '<div class="watermark"><img src="sprites/watermark.png"></div>';
/* MELON */


$all = "SELECT id, name, powerlevel FROM characters";
$allresult = $conn->query($all);
// if ($allresult->num_rows > 0) {
//   while($allrow = $allresult->fetch_assoc()) {
//     echo "id: " . $allrow["id"]. " - Name: " . $allrow["name"]. " - Power Level: " . $allrow["powerlevel"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }


?>
<!DOCTYPE html>
<html>
    <head>
    <title>Budokai Tenkaichi 3</title>
    <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
      <ul>
      <?php 
      /* if ($allresult->num_rows > 0) {
        while($allrow = $allresult->fetch_assoc()) {
          ?>
            <li>
              <?php echo $allrow["id"] ?> - name: <?php echo $allrow["name"] ?> <button><?php echo $allrow["name"] ?></button>
            </li>
          <?php
          // echo "id: " . $allrow["id"]. " - Name: " . $allrow["name"]. " - Power Level: " . $allrow["powerlevel"]. "<br>";
        }
      } else {
        echo "0 results";
      } */
    ?>
      </ul>
    


        <br>
        <div class="InputField">
          <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <label for="selection">Character:</label><br>
          <input type="text" id="selection" name="selection"><br>
          <input type="submit">
          </form>
        </div>
    </body>
</html>
</body>
</html>