<?php
		include '../dbcon.php';
        include '../header.php';
		session_start();
		$get_user = $_SESSION['id'];

		$grpsql = mysqli_query($dbcon, "SELECT * FROM members WHERE regNo='$get_user'") or die(mysqli_error());
		$group = mysqli_fetch_array($grpsql);

		$groupNo = $group['grpNo'];
	if ($group != null) {
		$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
		$reportsql = mysqli_query($dbcon,$repsql) or die(mysqli_error($dbcon));

		$report = mysqli_fetch_array($reportsql);
		$reviewfile = $report['review'];
		$chapterOne = $report['chapterOne'];
		$chapterTwo = $report['chapterTwo'];
		$progressReport = $report['progressReport'];
		$chapterThreeFour = $report['chapterThreeFour'];
		$finalReport = $report['finalReport'];
		$presetationReport = $report['presetationReport'];


		$reviewfile = $report['review'];
		$sem1_progress = $report['sem1_progress'];
		$sem1_final = $report['sem1_final'];
		$sem2_progress = $report['sem2_progress'];
		$sem2_final = $report['sem2_final'];
    }
	?>
	<style>
     .heading
      {
		font-size:24px;
		font-weight:bold;
		text-transform:uppercase;
      }
	  .tble-head
	  {
		  background-color:#795548 !important;
		  color:white;
	  }
    </style>
    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:90%;margin-top:80px;margin-bottom:50px;">    
        <!-- The Grid -->
        <div class="w3-row">
            <div id="main">
                    
                <div class="w3-row-padding">
                <div class="w3-col m12">
                    <div class="w3-card-2 w3-white">
                    <div class="w3-container w3-padding">
                        <h5 class="w3-center heading">VIEW THE REPORTS YOU HAVE SUBMITTED</h5>
                    </div>
                    </div>
                </div>
                </div>

            <br />
            
            <div class="w3-row-padding">
            <div class="w3-col m12">
                <div class="w3-card-2 w3-white">  
                <div class="w3-container w3-padding"> 

                <div class="w3-card-2">
                <table class="w3-table  w3-responsive w3-bordered">
			
			<tr class="tble-head">
				<th>Group No.</th>
				<td><?php echo $groupNo ?></td>
				</tr>
				<tr>
				<th>Submitted Proposal </th>
				<td><a <?php echo 'href="'.$reviewfile.'"'; ?>> View Report </a></td>
				</tr>
				<tr>
				<th>Submitted 	Chapter 1</th>
			<td><a <?php echo 'href="'.$chapterOne.'"'; ?>> View Report </a></td>
				</tr>
				<tr>
				<th>Submitted Chapter 2</th>
			<td><a <?php echo 'href="'.$chapterOne.'"'; ?>> View Report </a></td>
				</tr>
				<tr>
				<th>Submitted Project Progress</th>
			<td><a <?php echo 'href="'.$progressReport.'"'; ?>> View Report </a></td>
				</tr>
				<tr>
				<th>Submitted Chapter 3-4-5</th>
			<td><a <?php echo 'href="'.$chapterThreeFour.'"'; ?>> View Report </a></td>
				</tr>
			
			</tr>
				<tr>
				<th>Submitted Final Report</th>
			<td><a <?php echo 'href="'.$finalReport.'"'; ?>> View Report </a></td>
				</tr>
			
			</tr>
			</tr>
				<tr>
				<th>Submit Presentation</th>
			<td><a <?php echo 'href="'.$presetationReport.'"'; ?>> View Report </a></td>
				</tr>
			
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
        </div> 
    </div>  


    <br>

    <!-- Footer -->


    <?php include '..\footer.php'; ?>

