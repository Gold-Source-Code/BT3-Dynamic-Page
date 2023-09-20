<?php

$selection = $_SESSION['selection'];

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
?>