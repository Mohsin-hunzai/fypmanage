
<?php
	include '../header.php';
	$supId = $_SESSION['id'];

	$studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote WHERE supervisor = '$supId'") or die(mysqli_error($dbcon));
	
?>
<style>
	.tble-head
	{
      background-color:#795548 !important;
	}
	</style>

<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row-padding"
    <!-- Left Column -->
    <div class="w3-col m3 ">
    <?php
      include 'sup-nav.php';
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      
    	<div id="main">

		<table class="w3-table w3-hoverable">
			<thead>
			  <tr class="w3-dark-grey tble-head">
			    <th>Student</th>
			    <th>Proposed Title</th>
			    <th>Expected Output</th>
			    <th>Approve</th>
			  </tr>
			</thead>
			<?php 
				while($concept_note=mysqli_fetch_array($studentconcept)) {
				$studentid=$concept_note['studentid'];
				$reccomended=$concept_note['reccomended'];
			?>
			<tr>
			  <td><?php echo $concept_note['studentid']; ?></td>
			  <td>
			  	<a href="<?php echo $concept_note['conceptfile']; ?>" > <?php echo $concept_note['proposedtitle']; ?></a>
			  </td>
			  <td><?php echo $concept_note['expectedoutput'];  ?></td>
			  <td>
			  	<?php 
					if ($reccomended ==' ' OR $reccomended =='') {
					   echo '<a href="recomend.php?studentid='.$studentid.'"><button class="w3-padding w3-btn w3-green w3-left-align" ><i class="fa fa-check fa-fw"></i></button> </a>'; 

					   echo '<a href="notrecomend.php?studentid='.$studentid.'"><button class="w3-padding w3-btn w3-red w3-left-align" ><i class="fa fa-remove fa-fw"></i></button> </a>'; 
					} elseif ($reccomended =="yes")  
			        { 
			               echo "reccomended";
			        }
			      elseif ($reccomended =="no") 
			        { 
			              echo "not reccomended";
					
					}
					?>
			  </td>
			</tr>
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
