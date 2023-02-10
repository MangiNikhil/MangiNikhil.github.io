<?php
    // $host='localhost';
    // $username='root';
    // $password='';
    // $dbname = "hackforet";
    // $conn=mysqli_connect($host,$username,$password,"$dbname");
    $port='7146';
    $username='root';
    $password='mPVfmAb2YulMuv2ENA0y';
    $dbname = "railway";
    $host = "containers-us-west-40.railway.app";
    $conn=mysqli_connect($host,$username,$password,"$dbname","$port");
    if(!$conn)
        {
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>