<?php
if(isset($_POST["subject"]))
{
    include '../dbcon.php';
$subject = mysqli_real_escape_string($dbcon, $_POST["subject"]);
$comment = mysqli_real_escape_string($dbcon, $_POST["comment"]);
$query = "INSERT INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";
mysqli_query($dbcon, $query);
}
?>