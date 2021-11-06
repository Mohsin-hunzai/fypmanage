<?php  
  include('session.php'); 
  include('nav-header.php'); 

?>


<style>
.first{
  background-color: #0F74A8;
  color: white;
  padding: 40px;
}
 .first a
 {
   cursor: pointer;
   text-decoration: none;
 }
 .first img
 {
  width: 30%;
  background-color:#0F74A8;
  border-radius: 50%;
  box-shadow: 0 8px 16px 0 rgb(10 0 0 / 20%), 0 6px 20px 0 rgb(10 0 0 / 19%);
  /*margin-top: 40px 0px;*/
 padding: 12px;

 }
 .heading h1
 {
  color: #0F74A8;
}

</style>

    <div class="w3-center heading w3-animate-top">
      <h1 class="w3-padding ">KIU Final Year Project And Research Portal System</h1>
    </div>
    


    <div class="w3-row w3-center" style="width: 80%; margin:auto; margin-top: 100px; margin-bottom: 200px;">
      <div class="w3-card-3 w3-round w3-col  m4"  style="width:23%">
         <div class="w3-container  first">
           <a href="http://localhost/fypms-master/studentlogin.php"> 
            <img src="images/std.png">
            <h4>Student Login</h4>
             
           </a>
        </div>
      </div> 

        <div class="w3-card-4 w3-round  w3-margin-left w3-col m4"  style="width:23%"> 
        <div class="w3-container first">
          <a href="/fypms-master/cord-login.php ">
          
          <img src="images/nc.jpg">
          <h4>Co-ordinator Login</h4>
          </a>
         </div>
        </div> 

        <div class="w3-card-4 w3-round   w3-margin-left w3-col m4" style="width:23%"> 
        <div class="w3-container first">
          <a href="/fypms-master/sup-login.php ">
         
          <img src="images/sup.png">
          <h4>Supervisor Login</h4>
          </a>
         </div>
        </div> 
        <div class="w3-card-4 w3-round   w3-margin-left w3-col m4" style="width:23%"> 
        <div class="w3-container first">
          <a href="/fypms-master/admin-login.php">
         
          <img src="images/sup.png">
          <h4>Admin Login</h4>
          </a>
         </div>
        </div> 
    </div>  

  


<?php include('footer.php'); ?>