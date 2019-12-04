<?php
session_start();
$currentPath ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($currentPath, '?theme=') !== false) {
    SaveTheme($_GET['theme'].".css");
 //   Header("Location:http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
}

//get current dir and split
if (strpos($currentPath, '?dir=') !== false) {
    //split the ?dir of each \
    $dirary = $_GET['dir'];
$diraryCut =explode ("\\", $_GET['dir']);

}else{
    $dirary = "";
    $diraryCut = array("/");
}

?>

<HTML>
<head>
<link rel="stylesheet" href="style/style.css">
</head>
<body>

  <div id="menubar">

      <?php
      echo "<a href='/'>"."<span class='dirary'>"."Home  "."</span></a>";
      $dirloop ="";
      for($x = 0; $x < count($diraryCut)-1; $x++) {
          if($dirloop==""){
              //since dirloop is empty just at the first folder
              $dirloop = $diraryCut[$x];
          }else{
              //for each loop add the previus value of the dirarycut to dirloop so if its was folder1 should be folder1 + folder2
              $dirloop = $dirloop . "\\".$diraryCut[$x];
          }
          if (strpos($currentPath, '?dir=') !== false) {
              $extrdir = "?dir=";
              }else{
                  //if not add it
              $extrdir = "";
              }
      //loop throuth all the dirarycut
       echo "<a href='".$extrdir.$dirloop."\'>"."/<span class='dirary'> ".$diraryCut[$x]."</span></a>";
      }
      ?>
  </div>
  <div style="margin: 20px"><b>Name</b> <b style="padding-left: 200px;">Type</b> </div>
  <?php
  include "explorer.php" ;
  ?>
</body>
<HTML>
