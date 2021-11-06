<?php  
  include('session.php'); 
  include('nav-header.php'); 
?>
<style>
  .w3-label
  {
    text-align: start;
    margin-top: 10px;
    color: black;
    font-weight: 600
  }
  .w3-input
  {
    border: 1px solid #0F74A8;
    border-radius: 20px;
    margin-top: 10px;
  }
  .w3-btn{
    border-radius: 20px;
    background-color: #0F74A8 ;
   padding: 10px 50px;
    text-align: left;
}
/*body
{
  background-image: url('../images/kiu.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}*/


</style>

    <div class="w3-center heading w3-animate-top">
      <h1 class="w3-padding ">KIU Final Year Project And Research Portal System</h1>
      
    </div>

    <div class=" login-box w3-animate-zoom">
   
      <div style="background-color:white;"class="box-header w3-center">
       <img src="images/download.jpg" width="50%">
        <h3 style="color:#0F74A8;font-weight: 600;">Log In</h3>

      </div>

      <div class="w3-container w3-center">
      <form method="POST" action="">
        <div class="w3-label ">Registration No.</div>
        <input class="w3-input" type="text" name="username" placeholder="Username">
        <div class="w3-label label">Password</div>
        <input class="w3-input" type="password" name="password" placeholder="Password">
        <br/>
        <button class="w3-btn" type="submit" name="submit">Log In</button>
        <br/>
          <!--a href="#"><p class="small">Forgot your password?</p></a-->
      </form>
    <?php
        if (isset($_POST['submit'])){
                
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $password = $pass;
        // $password = md5($pass);
        
        
        $query = "SELECT * FROM login WHERE user='$username' AND passwrd='$password'";
        $result = mysqli_query($dbcon,$query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);
          $user_row=mysqli_fetch_array($result);

            $role = $user_row['role'];
            #var_dump($role);
          if( $num_row > 0 ) {
            $_SESSION['id'] = $username;
            $_SESSION['role'] = $role;

            if ($role == 2) 
            {
               header('location:student/');
            }    
                    
          }
          else{ ?>
        <div class="alert alert-danger">Access Denied</div>   
        <?php
        }}
        ?>    
      </div>
    </div>



<?php include('footer.php'); ?>