<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }

      * {
        box-sizing: border-box;
      }

      .navbar {
        background-color: #000;
        border-radius: 9px;

      }

      .navbar ul {
        overflow: auto;
        padding-top: 10px;
        padding-left: 85px;
        padding-bottom: 6px;
      }

      .navbar li a:hover {
        color: #ccc;

      }

      .navbar li {
        list-style: none;
        float: left;
        padding-left: 175px;
        font-size: 25px;
        
      }

      
      .navbar input {
        border-radius: 7px;
        padding-right: 29px;
        margin-right: 118px;
        padding-top: 7px;
        padding-bottom: 5px;
      }

      * {
        box-sizing: border-box;
      }

      .navbar li a {
        text-decoration: none;
        margin: 124px;
        color: white;
      }
      h3 {
        margin: 0px;
        text-align: center;
      }

      input[type=text],
      select{
        width: 100%;
        padding: 12px;
        border: 1px soli d #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
      }

      input[type=email] {
        width: 100%;
        padding: 12px;
        border: 1px soli d #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
      }

      input[type=password] {
        width: 100%;
        padding: 12px;
        border: 1px soli d #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
      }

      input[type=submit] {
        background-color: #1ba94c;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        /* margin-left: 255px; */

      }
      .register{
        background-color: #1ba94c;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        /* margin-top:20px; */
        margin-left: 255px;
        
        text-decoration: none;

      }

      .register:hover{
       background-color: #027a36;
      }


      h4 {
        margin: 0px;
      }

      input[type=submit]:hover {
        background-color: #027a36;
      }

      .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        
        margin: auto;
      }

      .cont {
        margin: auto;
      }

      .cont1 {
        background-color: #f2f2f2;
        margin: auto;
        padding-left: 420px;
        padding-right: 420px;
        height: 100vh;
      }
      #register{
          padding-left: 560px;
          padding-bottom: 10px;
          margin-bottom: 10px;
      }
      
    </style>
  </head>

<body>
 <?php
  include "connection.php";
  session_start();
  if($_POST){
    
     $email = $_POST['email'];
     $password = $_POST['password'];
    
    //  echo $email;
    //  echo $password;

    $sel = "select * from register where email = '$email' and password = '$password'";
    $result = mysqli_query($conn,$sel);
    $row = mysqli_fetch_array($result,MYSQLI_NUM);

    $count = mysqli_num_rows($result); 
    if($count ==1){
      echo "login succesful";
      $_SESSION['email'] = $email;
      header("Location:view.php");
    }else{
     echo "<p style='color:red'>incorrect credentials</p>";
    }
  }

?>
    <div class="cont">
      <div class="navbar">
        <ul>
          <li><a href="./view_material.php">Study Materials</a></li>
          <!-- <li><a href="#">Upload</a></li> -->
          <li><a href="./login.php" id="login">Login</a></li>

        </ul>
      </div>


    </div>
    <h3>login as uploader</h3>

    <div class="cont1">
     
      <div class="container">
        <form action="login.php" method="post">
          
          <label for="email">Email id</label> 
          
          <input type="email" id="email" required name="email" placeholder="your email..">

          <label for="password" required>Password</lable>
           
            <input type="password" id="password" name="password" placeholder="enter password">

<br>
            <input type="submit" value="Login">
            <a href="./forgetpassword">forget password?</a>
            <!-- <br> -->
            <a class="register" href="register.php">register</a>
        </form>
      </div>
    </div>
  

</body>

</html>