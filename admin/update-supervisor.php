<?php
    include '../dbcon.php';
    include '../session.php';    
    include '../header.php';

    // session_start();
    // $user =  $_SESSION['Email'];
    // $role = $_SESSION['Role'];

    
    if(isset($_POST['update']))
    {
               $empId=$_POST['empId']; 
               $fname=$_POST['fname'];
               $lname=$_POST['lName'];
               $email=$_POST['email'];
               $phone=$_POST['phone'];
               $pass=$_POST['pass']; 
               $expertise=$_POST['expertise'];
               $office=$_POST['office'];
               
               if (!empty($empId)|| !empty($fname)||!empty($email)||!empty($phone)||!empty($pass)||!empty($expertise))
               {
                  echo "updating";
                  $sql= "UPDATE supervisor SET `fName` = '$fname',  `lName` = '$lname', `email` = '$email', `phoneNo` = '$phone', `expertise` = '$expertise',`office` = '$office' WHERE `empId` = '$empId'";
                  mysqli_query($dbcon, $sql);
                 
                  $sql= "UPDATE `login` SET `passwrd`='".$pass."'  WHERE `user` = '".$empId."'";
                    mysqli_query($dbcon, $sql);

                  
                    $dbcon->close();
                    // header('Location:update-faculty.php'); 
                  
               }
            else
                
            {
                  echo 'Please fill up all fields';
                  header('Location:update-supervisor.php');
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
                                    <h5 class="w3-center heading">UPDATE SUPERVISOR DETAILS</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding "style="padding-bottom:51px">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">  
                                    
                                <form method="post" action="update-supervisor.php">
      
       <div style="background-color: #E7E9EB; margin-left: 33%; alignment-adjust: central; width: 35%;padding:30px">
           <table align="center"  width="100%" cellspacing="00" cellpadding="05">
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Supervisor ID&nbsp;:&nbsp; </font>    </td>
    <td>
        <?php
         include '../dbcon.php';
             $sql1="select * from supervisor";
             $result=  mysqli_query($dbcon, $sql1)
             ?> <select name="sup" style="width: 10em; height: 2em; font-size: 15px;">
                 <option >44</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                   $category= $row['empId'];
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
                    $empId=$_POST['sup'];
                    $sql="select * from supervisor where empId  ='$empId'; ";
                    $rec=mysqli_query($dbcon, $sql);
                    $row=mysqli_fetch_assoc($rec);
                    $sq="select passwrd  from login where user  ='$empId'; ";
                    $resultpas=mysqli_query($dbcon, $sq);
                    $rows=mysqli_fetch_assoc($resultpas);
       }
       ?>
       
       <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Supervisor ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="empId" value="<?php echo $row['empId'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
       
       
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="fname" value="<?php echo $row['fName'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Last Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="lName" value="<?php echo $row['lName'];?>"/></td>
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
    <td align="right"><font size="4">Phone&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="phone" value="<?php echo $row['phoneNo'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Password &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="password" name="pass" value="<?php echo $rows['passwrd'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Expertise&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="expertise" value="<?php echo $row['expertise'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Office&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="office" value="<?php echo $row['office'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2">
        <input class="btn" type="submit" name="update" value="Update" id="bt" />
    				
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
    
