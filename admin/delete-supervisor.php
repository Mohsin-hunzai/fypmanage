<?php
    include '../dbcon.php';
    include '../session.php';    
    include '../header.php';

    // session_start();
    // $user =  $_SESSION['Email'];
    // $role = $_SESSION['Role'];

    
    if(isset($_POST['delete']))
    {
               $empId=$_POST['empId'];                
                  echo "updating";

                    $sql = "DELETE FROM supervisor WHERE  `empId` = '$empId'";
                    $sql1 = "DELETE FROM `login` WHERE  `user` = '$empId'";
                    
                        if(mysqli_query($dbcon, $sql) && mysqli_query($dbcon, $sql1)){
                            echo "Records were deleted successfully.";
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbcon);
                        }

                  
                    $dbcon->close();
                  
          
    }
    
    if(empty($_SESSION['Email']))
    {
    // header("location:index.php");
    }
   
   
    ?>
  
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:20px">    
            <!-- The Grid -->
            <div class="w3-row w3-margin-top">
                <div id="main">                        
                    <div class="w3-row-padding w3-margin-top">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-container w3-padding ">
                                    <h5 class="w3-center">DELETE SUPERVISOR DETAILS</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding "style="padding-bottom:51px">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">  
                                    
                                <form method="post" action="delete-supervisor.php">
      
       <div style="background-color: beige; margin-left: 33%; alignment-adjust: central; width: 35%">
           <table align="center"  width="100%" cellspacing="00" cellpadding="05">
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">supervisor id&nbsp;:&nbsp; </font>    </td>
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
       <div style="background-color: beige; margin-left: 33%; alignment-adjust: central; width: 35%">
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
    <td align="right"><font size="5">supervisor id&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="empId" value="<?php echo $row['empId'];?>" readonly/></td>
    <td>&nbsp;</td>
  </tr>
       
       
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5" required readonly>Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="fname" value="<?php echo $row['fName'];?>" readonly/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Last name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="lName" value="<?php echo $row['lName'];?>" readonly/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Email&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="email" name="email" value="<?php echo $row['email'];?>" readonly/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Phone&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="phone" value="<?php echo $row['phoneNo'];?>" readonly/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Password &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="password" name="pass" value="<?php echo $rows['passwrd'];?>" readonly/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Expertise&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="expertise" value="<?php echo $row['expertise'];?>" readonly/></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Office&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="office" value="<?php echo $row['office'];?>" readonly/></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2">
        <input type="submit" name="delete" value="delete" id="bt" />
    				
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
    
