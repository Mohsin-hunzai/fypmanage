<?php

	include '../header.php';
	$supId = $_SESSION['id'];	

    
    $grpsql = mysqli_query($dbcon, "SELECT * FROM grp where grpId='25941' ") or die(mysqli_error());
    $group = mysqli_fetch_array($grpsql);

    $groupNo = $group['grpNo'];


    $repsql = "SELECT * FROM progressreport ";
    $repsql = "SELECT * FROM progressreport WHERE projectId in (SELECT projectId FROM project WHERE supid=$supId )";
    $reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

	
?>

<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row-padding">
    <!-- Left Column -->
    <div class="w3-col m3 ">
    <?php
      include 'sup-nav.php';
    ?>
    <!-- End Left Column -->
    </div>
    <style>
		.tble-head
 {
	 background-color: #795548 !important;
	 color:white;
 }
		</style>
    <!-- Middle Column -->
    <div class="w3-col m9">
      
    	<div id="main">
		   <table class="w3-table  w3-responsive w3-bordered">
			<thead>
			  <tr class="tble-head">
			    <th>Group No.</th>
			    <!--th>Review Report </th -->
			    <th>Proposal</th>
			    <th>Chapter 1</th>
			    <th>Chapter 2</th>
			    <th>Project Progress</th>
			    <th>Chapter 3-4-5</th>
			    <th>Final Report</th>
			    <th>Submit Presentation</th>
			   
			  </tr>
			</thead>
			<?php 
				//while($concept_note = mysqli_fetch_array($studentconcept)) {

                	while($report=mysqli_fetch_array($reportsql)) {
                      
                    $projectId=$report['projectId'];
                    $reviewfile = $report['review'];
                    $chapterOne = $report['chapterOne'];
                    $chapterTwo = $report['chapterTwo'];
                    $progressReport = $report['progressReport'];
                    $chapterThreeFour = $report['chapterThreeFour'];
                    $finalReport = $report['finalReport'];
                    $presetationReport = $report['presetationReport'];
                    // if($reviewfile=" "){
                    //     $reviewfile="no file";
                    // }else{
                    //     $reviewfile= $report['review'];
                    // }

                    $grpsql = mysqli_query($dbcon, "SELECT grpNo FROM progressreport where projectId=$projectId ") or die(mysqli_error());
                    $group = mysqli_fetch_array($grpsql);
                
                    $groupNo = $group['grpNo'];
			?>
			<tr>
			  <td><?php echo $groupNo ?></td>
			  <!--td><a <?php //echo 'href="'.$reviewfile.'"'; ?>> View Report </a></td-->
			  <td><a <?php echo 'href="'.$reviewfile.'"'; ?>> View Report </a></td>
			  <td><a <?php echo 'href="'.$chapterOne.'"'; ?>> View Report </a></td>
			  <td><a <?php echo 'href="'.$chapterTwo.'"'; ?>> View Report </a></td>
			  <td><a <?php echo 'href="'.$progressReport.'"'; ?>> View Report </a></td>
			  <td><a <?php echo 'href="'.$chapterThreeFour.'"'; ?>> View Report </a></td>
			  <td><a <?php echo 'href="'.$finalReport.'"'; ?>> View Report </a></td>
			  <td><a <?php echo 'href="'.$presetationReport.'"'; ?>> View Report </a></td>
			<?php } ?>
		   </table>   

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


