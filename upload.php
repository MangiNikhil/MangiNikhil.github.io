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
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
 <?php
    include "./connection.php";

    if($_POST){
     $sname = $_POST['sname'];
     $year = $_POST['year'];
     $branch = $_POST['branch'];
     $semester = $_POST['sem'];
     $uploader = $_POST['uploader'];
     // echo $sname;
     // echo $semester;
     // echo $year;
     // echo $branch;
    }
    $dir = 'uploads';
  if( is_dir($dir) === false )
  {
      mkdir($dir);
  }
    if((isset($_FILES["material"]))){
     echo "file got submitted";
     $fname = $_FILES['material']['name'];
     if(file_exists('uploads/'.$fname)){
      ?>
      <p>file already exists</p>
      <?php
     }else{
        if(move_uploaded_file($_FILES['material']['tmp_name'],'uploads/'.$fname)){
         $ins = "insert into material(mname,msubject,mbranch,myear,msem,uploader) values('$fname','$sname','$branch','$year','$semester','$uploader')";
         if(mysqli_query($conn,$ins)){
           echo "image uploaded to database";
            header("Location: view.php");
         }else{
          echo "error occured while inserting".mysqli_error($conn);
         }
        };
     }
    
    }
   
   
 ?>
   <form method="post"  action="upload.php" enctype="multipart/form-data">
    <h3>Upload a material</h3>

        <div class="container">
          
                <label for="sname">Subject of material</label>

                <input type="text" id="sname" name="sname" placeholder="subjectname..">

               
                <label for="year">Year</label>

                <select id="year" name="year">
                 <option value="sel">Select</option>
                 <option value="1st">I year </option>
                 <option value="2nd">II year</option>
                 <option value="3rd">III year</option>
                 <option value="4th">IV year</option>
               </select>

                <label for="semester">Semester</label>
                <select id="sem" name="sem">
                <option value="sel">Select</option>
                <option value="1st">I sem</option>
                <option value="2nd">II sem</option>
              </select>

               <label for="semester">branch</label>
                <select id="sem" name="branch">
                <option value="sel">Select</option>
                <option value="cse">cse </option>
                <option value="ece">ece</option>
                <option value="eee">eee</option>
                <option value="civil">civil</option>
                <option value="mech">MECH</option>
               </select>

                <label for="uploader">Uploaded By</label>
                <input type="text" id="uploader" name="uploader" placeholder="uploader Name ..">
               <label for="">upload material</label>
    <input type="file" name="material" id="">
    <input type="submit" value="upload">
                <!-- <input type="submit" value="Submit"> -->
            
        </div>

   
   </form>
</body>
</html>