<?php

$mid = $_GET['id'];
include "connection.php";

$del = "delete from material where mid = '$mid'";
$sel = "select mname from material where mid = '$mid'";
if(mysqli_query($conn,$sel)){
 echo "ok";
}
$result = mysqli_query($conn,$sel);
$row = mysqli_fetch_assoc($result);
if(mysqli_query($conn,$del))
{
  echo "delete material succesfull";
  unlink("uploads/".$row['mname']);
   header("Location:view.php");
}else{
 echo "error in deleting material";
}

?>