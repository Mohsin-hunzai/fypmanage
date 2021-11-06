<?php
    include '../dbcon.php';
        if(isset($_POST['addStudent']))
        {
           $id=$_POST['id']; 
           $name=$_POST['stname'];
           $mname=$_POST['mname'];
           $lname=$_POST['lname'];
           $email=$_POST['stemail'];
           $phone=$_POST['stphone'];
           $pass=$_POST['stpass']; 
           $course=$_POST['course'];
           $role=2;
           
           
          if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($course))
           {
              
            $sql= "INSERT INTO `student` (`regNo`, `fName`, `mName`, `lName`, `email`, `phoneNo`, `course`) VALUES ('$id', '$name','$mname','$lname', '$email','$phone', '$course')";
            mysqli_query($dbcon, $sql);
            $sql1= "INSERT INTO `login` (`user`, `passwrd`, `role`) VALUES ('$id', '$pass','$role');";
                mysqli_query($dbcon, $sql1);
                $dbcon->close();
                header('Location:create-student.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:create-student.php');
        }       
                  
        }
 
?>
    