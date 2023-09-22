<?php
session_start();
$selection = $_SESSION['selection'];
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "budokai4";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM characters";
$result = $conn->query($sql);

if (empty($_GET["id"])) {
    $selection = "placeholder";
} else {
    $selection = $_GET['id'];
}
  $truevalue = "SELECT name, color, avatar, bio from characters WHERE id = $selection";
  $trueresult = $conn->query($truevalue);

  if($selection == "placeholder"){
    $bgcolor = 'beige';
    $selecttext = "placeholder";
    $showimage = "placeholder.png";
    $biotext = "placeholder";
  }
  else{
    if ($trueresult->num_rows > 0){
        while($truerow = $trueresult->fetch_assoc()) {
            $bgcolor = $truerow["color"];
            $selecttext = $truerow["name"];
            $showimage = $truerow["avatar"];
            $biotext = $truerow["bio"];
        }
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/BT3-Dynamic-Page/stylesheet.css">
    </head>
        <body style=" background-color: <?php echo $bgcolor ?>">
            <a href="/BT3-Dynamic-Page/ThePage.php">Return</a>
            <div class="middle">
                <h1 class="nametext"><?php echo $selecttext ?></h1>
                <img class="avatar" src="/BT3-Dynamic-Page/sprites/<?php echo $showimage ?>">
                <p class="biotext"><?php echo $biotext ?></p>
                <?php include "watermark.php" ?>
            </div>

            <!-- MELON -->
        </body>
    </html>
