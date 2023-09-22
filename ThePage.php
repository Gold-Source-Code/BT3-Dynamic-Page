<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "budokai4";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM characters";
$result = $conn->query($sql);
?>


<?php
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
      if ($allresult->num_rows > 0) {
        while($allrow = $allresult->fetch_assoc()) {
          ?>
            <li>
            <a href="/BT3-Dynamic-Page/TheSecondPage.php/?id=<?php echo $allrow["id"] ?>"><?php echo $allrow["id"] ?> - name: <?php echo $allrow["name"] ?></a>
          <?php
        }
      } else {
        echo "0 results";
      }
    ?>
      </ul>
    


        <br>
        <div class="InputField">
          <form method="post" action="/BT3-Dynamic-Page/TheSecondPage.php">
          <label for="selection">Character:</label><br>
          <input type="text" id="selection" name="selection"><br>
          <input type="submit">
          </form>
          <?php include "watermark.php" ?>
        </div>
    </body>
</html>
</body>
</html>