<?php
  include '../header.php';
 
 $studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote ") or die(mysqli_error());
?>

<!-- Page Container -->
<style>
	#main
	{
		margin-left: 0 auto;
	}
    .sideBar
    {
        background-color:#0F74A8;
        padding: 30px;
    }
</style>
<div class="w3-container  w3-content " style="max-width:94%;margin-top:80px; padding:0px;margin-bottom: 50px;">    
  <!-- The Grid -->
  <div class="w3-row ">
    <!-- Left Column -->
    <div class="w3-col m3 sideBar">
    <?php include 'coord-nav.php';   ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      
	  <div id="main">

	    <div class="w3-row-padding w3-container w3-center">
			<div id="approval" class="w3-card-2 "> </div>
			
			
			<h3 style="font-weight: 800;color:#363030;font-family: sans-serif">SYNOPSIS</h3>
			  <div class="w3-card-2">
				<table class="w3-table w3-hoverable" border="0">
				<thead>
				  <tr class="w3-brown">
				    <th colspan="">Student</th>
				    <th>Proposed Title</th>
				    <th>Concept </th>
				    <th>Proposed Supervisor </th>
				    <th>Recommended </th>
				    <th style="width: 127px;">Approval </th>
				    <th></th>
				  </tr>
				</thead>
				<?php 
					do{
						$noteId = $concept_note['conceptid'];
						$approval = $concept_note['approval'];

						$stndid=$concept_note['studentid'];
						$supid=$concept_note['supervisor'];
						$result = mysqli_query($dbcon, "SELECT fName,lName FROM supervisor WHERE empId = '$supid'") or die(mysql_error());
                      $user_row = mysqli_fetch_array($result);
                      $supname=$user_row['fName']." ".$user_row['lName'];
				?>
				<tr>
				  <td><?php echo $concept_note['studentid']; ?></td>
				  <td><?php echo $concept_note['proposedtitle']; ?></td>
				  <td><?php echo '<a href="'.$concept_note['conceptfile'].'">View Document</a>'; ?></td>
				  <td><?php echo  $supname?></td>
			      <td><?php echo $concept_note['reccomended']; ?></td>
			      <td>
			      <?php

					if ($approval =="waiting") {
				         echo '<a href="approval.php?concept='.$noteId.'"><button class="w3-padding w3-btn w3-green w3-left-align" ><i class="fa fa-check fa-fw"></i></button> </a>'; 

				         echo '<a href="disapproval.php?concept='.$noteId.'"><button class="w3-padding w3-btn w3-red w3-left-align" ><i class="fa fa-remove fa-fw"></i></button> </a>'; 
				      		  			
					
					} elseif ($approval =="approved")  
			        { 
			               echo "Approved";
			        }
			      elseif ($approval =="disapproved") 
			        { 
			              echo "Disapproved";
			        }  
			      ?>
				  </td>
				</tr>
				<?php }while($concept_note=mysqli_fetch_array($studentconcept)) 
				 ?>
				</table>
			
				</div>
		</div>
	  </div>
      
    <!-- End Middle Column -->
    </div>
    
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php
  include '../footer.php';
?>




