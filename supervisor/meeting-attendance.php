<?php
    
include '../dbcon.php';
    include '../session.php';    
    include '../header.php';
    $get_empid = $_SESSION['id'];
    $attended="1";
    $meetingattendance = mysqli_query($dbcon, "SELECT * FROM meeting WHERE empId=$get_empid  ORDER BY grpNo ASC") or die(mysqli_error()); 

    $meetingattendancereports = mysqli_query($dbcon, "SELECT SUM(`Attended`) as count From `meeting` WHERE empId=$get_empid");
    $total = 0;
    $rec =  mysqli_fetch_assoc($meetingattendancereports);
    $total = $rec['count']; 

    if(isset($_POST['submit']))
    {
       $grpno=$_POST['grpno']; 
       $meetingattendance = mysqli_query($dbcon, "SELECT * FROM meeting WHERE grpNo=$grpno ");

       $meetingattendanceGroupreport= mysqli_query($dbcon, "SELECT SUM(`Attended`) as count From `meeting` WHERE empId=$get_empid AND grpNo=$grpno");
       $total = 0;
       $rec =  mysqli_fetch_assoc($meetingattendanceGroupreport);
       $total = $rec['count']; 
    }
    
    if(isset($_POST['listall']))
    {
       $grpno=$_POST['grpno']; 
       $meetingattendance = mysqli_query($dbcon, "SELECT * FROM meeting WHERE empId=$get_empid ORDER BY grpNo ASC");
    }
    


    ?>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px">    
            <!-- The Grid -->
            <div class="w3-row">
                <div id="main">                        
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-container w3-padding">
                                    <h5 class="w3-center">MEETING ATTENDANCE</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">  
                                <form method="post" action="meeting-attendance.php">
        <table class="w3-table w3-hoverable w3-responsive w3-bordered" style="width:43%">
				<tr>
				<th>Group ID : </th>
			<td>
            <?php
            include '../dbcon.php';
             $sql="SELECT grpNo FROM grp WHERE empId = '$get_empid'";
             $result=  mysqli_query($dbcon, $sql)
             ?>
              <select name="grpno" style="width: 10em; height: 2em; font-size: 15px;">
                 
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
    <td colspan="2" align="center"><input style="width: 4em;  height: 2em; font-size: 20px;" type="submit" name="submit" value="Search" /></td>
    <td colspan="1" ><input style="width: 4em;  height: 2em; font-size: 20px;" type="submit" name="listall" value="List All" /></td>
    
  </tr>

	
			</table>  
            </form>                  
                    
            <div class="w3-card-2">
				<table class="w3-table w3-hoverable" border="0">
				<thead>
				  <tr class="w3-brown">
				    <th colspan="">Meeting Id</th>
				    <th>Group Id</th>
				    <th>Date </th>
				    <th>Time </th>
				    <th>description </th>
				    <th>Attended </th>
				    <th></th>
				  </tr>
				</thead>
				<?php 
					while($attendence=mysqli_fetch_array($meetingattendance)){
						$notemeetId = $attendence['meeting_id'];
						$Attended = $attendence['Attended'];
				?>
				<tr>
				  <td><?php echo $attendence['meeting_id']; ?></td>
				  <td><?php echo $attendence['grpNo']; ?></td>
				  <td><?php echo $attendence['date']; ?></td>
				  <td><?php echo $attendence['time']; ?></td>
			      <td><?php echo $attendence['description']; ?></td>
			      <td>
			      <?php

					if ($Attended =="waiting") {
				         echo '<a href="attended.php?meeting='.$notemeetId.'"><button class="w3-padding w3-btn w3-green w3-left-align" ><i class="fa fa-check fa-fw"></i></button> </a>'; 

				         echo '<a href="absent.php?meeting='.$notemeetId.'"><button class="w3-padding w3-btn w3-red w3-left-align" ><i class="fa fa-remove fa-fw"></i></button> </a>'; 
				      		  			
					
					} elseif ($Attended =="1")  
			        { 
			               echo "attended";
			        }
			      elseif ($Attended ==0) 
			        { 
			              echo "missed";
			        }  
			      ?>
				  </td>
				</tr>
				<?php } 
				 ?>
                <tr class="w3-brown">
				    <td colspan="">Total Meeting Attended</th>
				    <th></th>
				    <th> </th>
				    <th> </th>
				    <th> 
                       
                    </th>
				    <td>
                        <?php
                        echo  $total ;
                        ?>
                    </td>
                    <th> 
                       
                    </th>
				  </tr>
				</table>
			
				</div>
              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>  
        <br>

        <?php include '..\footer.php'; ?>
    
