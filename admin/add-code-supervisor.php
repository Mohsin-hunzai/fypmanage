<?php
    include '../dbcon.php';
        if(isset($_POST['add']))
        {
           $id=$_POST['id']; 
           $name=$_POST['faname'];
           $lname=$_POST['lname'];
           $email=$_POST['faemail'];
           $phone=$_POST['faphone'];
           $pass=$_POST['fapass']; 
           $expertise=$_POST['expertise'];
           $office=$_POST['office'];
           
           
          if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($qualification))
           {
              
            $sql= "INSERT INTO `supervisor` (`empId`, `fName`, `lName`, `email`, `phoneNo`, `expertise`, `office`) VALUES ('$id', '$name','$lname', '$email',$phone, '$expertise', '$office')";
            mysqli_query($dbcon, $sql);
            $sql1= "INSERT INTO `login` (`user`, `passwrd`, `role`) VALUES ('$id', '$pass',1);";
                mysqli_query($dbcon, $sql1);
                $dbcon->close();
                header('Location:index.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:index.php');
        }       
                  
        }
 
?>
    