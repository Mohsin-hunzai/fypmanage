<?php
    
include '../dbcon.php';
    include '../session.php';    
    include '../header.php';
    $get_empid = $_SESSION['id'];
    if(isset($_POST['submit']))
    {
       $grpno=$_POST['grpno']; 
       $empId=$_POST['empId'];
       $date=$_POST['dat'];
       $time=$_POST['time'];
       $des=$_POST['des']; 
       $attend='waiting';
       
          if (!empty($date)||!empty($time)||!empty($dec))
       {
       
       $sql= "INSERT into meeting(`grpNo`, `s_id`, `empId`, `date`,`time`,`description` ,`Attended`) VALUES ('$grpno','', '$empId', '$date', '$time', '$des','$attend')";
       mysqli_query($dbcon, $sql);
       $dbcon->close();
       
    }
    else
        
    {
          echo 'Please fill up all fields';
          header('Location:arrangemeeting.php');
    }   
       
              
    }

?>
<style>
    .heading
    {
        font-size:24px;
        font-weight:bold;
    }
    </style>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
            <!-- The Grid -->
            <div class="w3-row">
                <div id="main">                        
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-container w3-padding">
                                    <h5 class="w3-center heading">ARRANGE MEETING</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">  
                                <form method="POST" action="arrangemeeting.php">
        <table class="w3-table  w3-responsive w3-bordered">
			
			  
				<tr>
				<th>Faculty ID : </th>
				<td><input id="in" type="text" name="empId" value="<?php echo $get_empid;?>" readonly/></th></td>
				</tr>
				<tr>
				<th>Group ID : </th>
			<td>
            <?php
            include '../dbcon.php';
             $sql="SELECT grpNo FROM grp WHERE empId = '$get_empid'";
             $result=  mysqli_query($dbcon, $sql)
             ?>
              <select name="grpno" style="width: 10em; height: 2em; font-size: 15px;">
                 <option selected>Supervisory</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['grpNo'];
                     ?>
                 <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
            </select>
            </td>
				</tr>
				<tr>
				<th>Date : </th>
			<td><input id="in" type="date" name="dat"/></td>
				</tr>
				<tr>
				<th>Time : </th>
			<td><input id="in" type="time" name="time" /></td>
				</tr>
				<tr>
				<th>Description :</th>
			<td><textarea id="in" name="des" cols="22" rows="5"></textarea></td>
				</tr>
				<tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input style="width: 4em;  height: 2em; font-size: 20px;background-color:#0F74A8;color:white;" type="submit" name="submit" value="Submit" /></td>
    <td>&nbsp;</td>
  </tr>
		
			
			</table>  
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
    
