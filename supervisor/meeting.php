
<?php
	include '../header.php';
	$supId = $_SESSION['id'];

	$studentconcept = mysqli_query($dbcon, "SELECT * FROM conceptnote WHERE supervisor = '$supId'") or die(mysqli_error($dbcon));
	
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
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      
    	<div id="main" style="border:solid;">

		<table class="w3-table w3-hoverable">
			<thead>
			  <tr class="w3-dark-grey">
			    <th>meeting</th>
                

                <form method="post" action="meeting.php">
    <div style="background-color:beige; border:1px solid black; width:40%; margin-left:30%; margin-top:50px;">
<table width="100%" border="0" cellspacing="05" cellpadding="05">
  <tr>
    <th width="14%" rowspan="2" scope="col">&nbsp;</th>
    <th colspan="2" scope="col"><font size="6">MEETING DETAIL</font></th>
    <th width="12%" rowspan="2" scope="col">&nbsp;</th>
  </tr>
  <tr>
      <td width="36%" scope="col" align="right"><font size="5">Faculty ID : </font></th>
      <td width="38%" scope="col"><input id="in" type="text" name="fid" value="<?php echo $user;?>" readonly/></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" ><font size="5">Student ID : </font></td>
    <td align="left">
                
    <?php
            include '../connection.php';
             $sql="select s_id from project where f_id='$user';";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="sid" style="width: 10em; height: 2em; font-size: 15px;">
                 <option selected>Supervisory</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['s_id'];
                     ?>
                 <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
            </select>
            </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Date :  </font></td>
    <td><input id="in" type="date" name="dat"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Time : </font></td>
    <td><input id="in" type="time" name="tem" /><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Description : </font></td>
    <td><textarea id="in" name="des" cols="22" rows="5"></textarea><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input style="width: 4em;  height: 2em; font-size: 20px;" type="submit" name="submit" value="Submit" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
    </div>
</form>

			    
			  </tr>
			</thead>
			<?php 
				while($concept_note=mysqli_fetch_array($studentconcept)) {
			?>
			<tr>
			  <td><?php echo $concept_note['studentid']; ?></td>
			  <td>
			  	<a href="<?php echo $concept_note['conceptfile']; ?>" > <?php echo $concept_note['proposedtitle']; ?></a>
			  </td>
			  <td><?php echo $concept_note['expectedoutput'];  ?></td>
			  <td>
			  	<?php //echo $concept_note['approval'];  ?>
			  	 	<button class="w3-padding w3-btn w3-green w3-left-align" onclick="approveConcept()"><i class="fa fa-check fa-fw"></i></button>
		            <button class="w3-padding w3-btn w3-red w3-left-align" onclick="disapproveConcept()"><i class="fa fa-remove fa-fw"></i></button>
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
