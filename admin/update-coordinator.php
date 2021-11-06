<?php
    include '../dbcon.php';
    include '../session.php';    
    include '../header.php';

    // session_start();
    // $user =  $_SESSION['Email'];
    // $role = $_SESSION['Role'];

    
    if(isset($_POST['update']))
    {
               $id=$_POST['id']; 
               $fname=$_POST['fname'];
               $email=$_POST['email'];
               $phone=$_POST['phone'];
               $pass=$_POST['password']; 
               
               if (!empty($id)|| !empty($fname)||!empty($email)||!empty($phone)||!empty($pass)||!empty($course))
               {
                  echo "updating";
                  $sql= "UPDATE coordinator SET `name` = '$fname', `email` = '$email', `phone` = '$phone', `password` = '$pass' WHERE `id` = '$id'";
                  mysqli_query($dbcon, $sql);
                 
                  $sql= "UPDATE `login` SET `passwrd`='".$pass."'  WHERE `user` = '".$id."'";
                    mysqli_query($dbcon, $sql);

                  
                    $dbcon->close();
                    // header('Location:update-faculty.php'); 
                  
               }
            else
                
            {
                  echo 'Please fill up all fields';
                  header('Location:update-coordinator.php');
            }  
    }
    
    
    
    
    
    
    
    if(empty($_SESSION['Email']))
    {
    // header("location:index.php");
    }
   
   
    ?>
      <style>
      .heading
      {
        font-size:24px;
        font-weight:bold;
      }
      input
      {
        height:35px;
        margin-bottom:10px;
      }
    
        .btn {
    font-weight: bold;
    color:white;
    font-size: 15px;
    background-color: #0F74A8 !important;
        }
    #bt{
      font-weight: bold;
    color:white;
    font-size: 15px;
    background-color: #0F74A8 !important;
    margin-top:10px !important;
    }
      </style>
  
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:20px">    
            <!-- The Grid -->
            <div class="w3-row w3-margin-top">
                <div id="main">                        
                    <div class="w3-row-padding w3-margin-top">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-container w3-padding ">
                                    <h5 class="w3-center heading">UPDATE COORDINATOR DETAILS</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding "style="padding-bottom:51px">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">  
                                    
                                <form method="post" action="update-coordinator.php">
      
       <div style="background-color: #E7E9EB; margin-left: 33%; alignment-adjust: central; width: 35%;padding:30px">
           <table align="center"  width="100%" cellspacing="00" cellpadding="05">
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Coordinator ID&nbsp;:&nbsp; </font>    </td>
    <td>
        <?php
         include '../dbcon.php';
             $sql1="select * from coordinator";
             $result=  mysqli_query($dbcon, $sql1)
             ?> <select name="std" style="width: 10em; height: 2em; font-size: 15px;">
                 <!-- <option >44</option> -->
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                   $category= $row['id'];
                   ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
             
             </select></td>
  </tr>
               <tr>
                   <td colspan="3" align="center"><input id="bt" type="submit" name="search" value="Search" />
    </td>
    <td>&nbsp;</td>
              
  </tr>
       </table>
       </div> 
       <br/><br/>
       <div style="background-color: #E7E9EB; margin-left: 33%; alignment-adjust: central; width: 35%;padding:30px">
       <table align="center"  width="100%" cellspacing="00" cellpadding="05">
       <?php
       if (isset($_POST['search']))
       {
                    $id=$_POST['std'];
                    $sql="select * from coordinator where id  ='$id'; ";
                    $rec=mysqli_query($dbcon, $sql);
                    $row=mysqli_fetch_assoc($rec);
                    $sq="select passwrd  from login where user  ='$id'; ";
                    $resultpas=mysqli_query($dbcon, $sq);
                    $rows=mysqli_fetch_assoc($resultpas);
       }
       ?>
       
       <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Coordinator ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="id" value="<?php echo $row['id'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
       
       
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="fname" value="<?php echo $row['name'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>

    <tr>
      <td>&nbsp;</td>
      <td align="right"><font size="4">Phone&nbsp;:&nbsp;</font></td>
      <td><input id="in" type="text" name="phone" value="<?php echo $row['phone'];?>"/></td>
      <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Email&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="email" name="email" value="<?php echo $row['email'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Password &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="password" name="password" value="<?php echo $rows['password'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <!-- <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Course&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="course" value="<?php echo $row['course'];?>"/></td>
    <td>&nbsp;</td>
  </tr> -->
  
  
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2">
        <input type="submit" name="update" value="Update" id="bt" />
    				
    <td>&nbsp;</td>
  </tr>
</table>
      </div>
  </form>
                                    
                                
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>  
        <br>

        <?php include '..\footer.php'; ?>
    
