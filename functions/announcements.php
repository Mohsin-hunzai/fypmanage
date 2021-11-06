<?php 

include '../dbcon.php';

$role = $_SESSION['role'];

?>
<div class="w3-container w3-card-2  w3-margin w3-center card-head">
	<h6>ANNOUNCEMENTS</h6>
</div>
<?php 
// $get_user = $_SESSION['time'];

$sql = "SELECT * FROM announcement ORDER BY time DESC ";

$result = mysqli_query($dbcon,$sql) or die(mysqli_error());;
$row = mysqli_fetch_array($result);

#$num_rows = mysqli_num_rows($result);
do {
	# code...


?>
<style>
        .card
        {
                background-color:#0F74A8 !important;
                color:white;
        }
        .card-head
        {
                background-color:#0F74A8 ;
                color:white;
                
        }
        h6
        {
                font-size:14px;
        }
        </style>

<div class="w3-container w3-card-2  w3-round w3-margin card"><br>

        <span class="w3-right w3-opacity"><?php echo "Posted at ".$row['time'] ;?></span>
        <h4><?php echo $row['title'];?></h4>
        <p><?php echo $row['description']; 
        ?></p>
        
 </div>
 <?php } while ($row = mysqli_fetch_array($result))
 ?>