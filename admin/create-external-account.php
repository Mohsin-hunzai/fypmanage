<?php
    include '../dbcon.php';
    include '../session.php';
    
    include '../header.php';
    $student = $_SESSION['id'];

    ?>
        <style>
      .heading
      {
        font-size:24px;
        font-weight:bold;
      }
      input
      {
        height:35px;
        margin-bottom:10px;
      }
    
        #bt {
    font-weight: bold;
    color:white;
    font-size: 15px;
    background-color: #0F74A8 !important;
    
    
    
    }
      </style>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:90%;margin-top:80px;margin-bottom: 50px;">    
            <!-- The Grid -->
            <div class="w3-row">
                <div id="main">                        
                    <div class="w3-row-padding w3-margin-top">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-container w3-padding">
                                    <h5 class="w3-center heading">CREATE ACCOUNT</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                
                    <div class="w3-row-padding">
                        <div class="w3-col m12">
                            <div class="w3-card-2 w3-white">  
                                <div class="w3-container w3-padding">     
                                    
                                <form method="post" action="add-code-external.php">
        <br/><br/><br/><br/>
        <div style="background-color: #E7E9EB; margin-left: 25%; alignment-adjust: central; width: 50%">
            <table width="100%" border="0" cellspacing="00" cellpadding="05" align="center">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">External ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="id"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="name"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Phone&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="cphone"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Email&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="email" name="cemail"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="4">Password &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="password" name="cpass"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
 
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2"><input type="submit" name="addcoor" value="Add" id="bt"/>
    				
    <td>&nbsp;</td>
  </tr>
            </table>  <br/><br/></div></form>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>  
        <br>

        <?php include '..\footer.php'; ?>
    
