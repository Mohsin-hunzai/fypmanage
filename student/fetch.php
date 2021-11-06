<?php
include '../dbcon.php';
if(isset($_POST['view'])){
if($_POST["view"] != '')
{
   $update_query = "UPDATE notfication SET notification_status = 1 WHERE notification_status=0 ";
   mysqli_query($dbcon, $update_query);
}
$query = "SELECT * FROM notfication ORDER BY notification_id DESC LIMIT 5";
$result = mysqli_query($dbcon, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["subjects"].'</strong><br />
  <small><em>'.$row["notification"].'</em></small><br />
  <small><em>'.$row["date"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
}
$status_query = "SELECT * FROM notfication WHERE notification_status=0 ";
$result_query = mysqli_query($dbcon, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>