<?php
    include '../dbcon.php';
        if(isset($_POST['addcoor']))
        {
           $id=$_POST['id']; 
           $name=$_POST['name'];
           $email=$_POST['cemail'];
           $phone=$_POST['cphone'];
           $pass=$_POST['cpass']; 
           $role=0;
           
           
          if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($course))
           {
              
            $sql= "INSERT INTO `coordinator` (`id`, `name`, `phone`, `email`, `password`, `role`) VALUES ('$id','$name','$phone' , '$email','$pass', '$role')";
            mysqli_query($dbcon, $sql);
            $sql1= "INSERT INTO `login` (`user`, `passwrd`, `role`) VALUES ('$id', '$pass','$role');";
                mysqli_query($dbcon, $sql1);
                $dbcon->close();
                header('Location:create-coordinator-account.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:create-student.php');
        }       
                  
        }
 
?>
    