<?php 
   session_start();
  if($_SESSION['email']==""){
    header("Location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="viewstyle.css">
 <link rel="stylesheet" href="style.css">
 <title>Document</title>
</head>
<body>
  <div class="navbar">
            <ul>
                <li><a href="./view.php">Study Materials</a></li>
                <li><a href="./upload.php">Upload</a></li>
                <?php 
                 if($_SESSION['email']!=""){
                   ?>
                   <li><a href="./logout.php">logout</a></li>
                   <?php
                 }else{
                   ?>
                    <li><a href="./login.php">login</a></li>
                   <?php
                 }
                
                ?>
                <!-- <input type="text" class="search" name="search" id="search" placeholder="search here"> -->
            </ul>
        </div>


    <h2>Material of all brances and sections and years</h2>
    <?php include "connection.php" ?>
    
    <?php 

      $sel = "select * from material";
      $result = mysqli_query($conn,$sel);
      ?>
      <div class="wrapper">
       <?php
      while($row = mysqli_fetch_assoc($result)){ 
    ?>
        <ul class="material">
         
         <li><p class="text-center"> <b> Material name: </b><?= $row['mname'] ?></p></li>
         <li><p class="text-center"> <b>Material year:</b> <?= $row['myear'] ?></p></li>
         <li><p class="text-center"> <b>Material branch:</b> <?= $row['mbranch'] ?></p></li>
         <li><p class="text-center"> <b>Material semester:</b> <?= $row['msem'] ?></p></li>
         <li><p class="text-center"> <b>Material uploader:</b> <?= $row['uploader'] ?></p></li>
         <li class="text-center"><a class="btn btn-primary m-2" href="uploads/<?= $row['mname']?>" download>download</a></li>
         <li class="text-center"><a class="btn btn-secondary m-2" href="see.php?id=<?= $row['mname']?>">view</a></li> 
         <?php
          if($_SESSION['email']!=""){
           ?>
 <li class="text-center"> <a class="btn btn-danger m-2" href="delete.php?id=<?=$row['mid']?>" onclick="return confirm('Are you surely want to delete the material?');">delete</a></li>
           <?php
          }
         
         ?>
        
        </ul>
       
    <?php
      }
    ?>
    </div>
</body>

</html>