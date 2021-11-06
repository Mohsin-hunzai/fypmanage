<?php
    include '../dbcon.php';
    include '../session.php';
    
    include '../header.php';
    $empId = $_SESSION['id'];
    
    if(isset($_POST['shareidea']))
    {
        $title=$_POST['title']; 
        $description=$_POST['description'];
        $result = mysqli_query($dbcon, "SELECT fName,lName FROM supervisor WHERE empId = '$empId'") or die(mysql_error());
      $user_row = mysqli_fetch_array($result);
      $fname=$user_row['fName'];
      $lname=$user_row['lName'];
      $name=$fname." ". $lname;

        // $mname=$_POST['mname'];
        // $supName = mysqli_query($dbcon, "SELECT fName FROM supervisor WHERE empId=1234 ") or die(mysqli_error());
        // echo "asdf";
        // $projectDetails=mysqli_fetch_array($supName);
        // echo $projectDetails;

       if (!empty($title) AND !empty($description))
       {          
        $sql= "INSERT INTO `projectidea` (`supervisorId`,`supervisorName`, `title`, `description`) VALUES ('$empId',' $name','$title','$description')";
        mysqli_query($dbcon, $sql);
       }
    else
        
    {
          echo 'Please fill up all fields';
    }  
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
    
        </style>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
            <!-- The Grid -->
            <div class="w3-row">
                <!-- <div id="main">       -->
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white w3-padding">
                                <!-- <div class="w3-container w3-padding"> -->
                                    <h5 class="w3-center heading">SHARE PROJECT IDIEAS</h5>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white w3-padding">  
                            <form method="post" action="share-project-idea.php">
        
        <div style="background-color:#E7E9EB;padding:40px; margin-left: 25%; alignment-adjust: central; width: 50%">
            <table width="100%" border="0" cellspacing="00" cellpadding="05" align="center">
 
  <tr>
    <td align="right"><font size="4">Project Title Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="title"/><font color="red">*</font></td>
  </tr>
  <tr>
    <td align="right"><font size="4">Project Description&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="description"/><font color="red">*</font></td>
  </tr> 
  <tr  align="center">
    <td colspan="4"><input class="btn" type="submit" name="shareidea" value="Share Idea" >
    				
  </tr>
            </table>  <br/><br/></div></form>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>

        </div>  
        <br>

        <?php include '..\footer.php'; ?>
    

