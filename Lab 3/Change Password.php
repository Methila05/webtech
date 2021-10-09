<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>


<?php
$pass = "abcdefg@";
$currentPassErr = $newPassErr =  $reNewPassErr ="";
$currentPass = $newPass = $reNewPass = "";
$verify = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["currentPass"])) {
    $currentPassErr = "Your current password is required";
    $verify = 0;
  } else {
    $currentPass = test_input($_POST["currentPass"]);
    	if ($currentPass != $pass ){
          $currentPassErr = "Password entered is not correct";
          $currentPass = "";
          $verify = 0;
        }
        
  }

  if (empty($_POST["newPass"])) {
    $newPassErr = "Please input new password";
    $verify = 0;
  } else {
    $newPass = test_input($_POST["newPass"]);
      if (!preg_match('#[@$%]{1}#', $newPass)) {
      $newPassErr = "Use one of the special characters (@, $, %)";
      $newPass = "";
      $verify = 0;
    }
      else {
        if (strlen($newPass) < 8 ){
          $newPassErr = "Password must not be less than eight characters";
          $newPass = "";
          $verify = 0;
        }
        else{
          if ($currentPass == $newPass){
            $newPassErr = "Your current password and new password must be different";
            $verify = 0;

          }
        }
     }
    }

  if (empty($_POST["reNewPass"])) {
    $reNewPassErr = "Retype new password";
    $verify = 0;
  } else {
    $reNewPass = test_input($_POST["reNewPass"]);
      if ($newPass != $reNewPass ){
          $reNewPassErr = "New password and retyped new password must be same";
          $reNewPass = "";
          $verify = 0;
      }
        
  }

  if ($verify == 1){
	echo "<h2> Password changed successfully</h2>";
  }
  else{
	echo "<h2> Password change isn't successful</h2>";
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h3 align="" style = "display:inline-block; width:250px;text-align:right;">CHANGE PASSWORD</h3><br />
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <span style = "display:inline-block; width:250px;text-align:right;"><b>Current Password : </b></span>
  <input type="password" name="currentPass" value="<?php echo $currentPass;?>">
  <span class="error">* <?php echo $currentPassErr;?></span>
  <br><br>

  <span style = "display:inline-block; width:250px;text-align:right;"><b>New Password :</b></span> 
  <input type="password" name="newPass" value="<?php echo $newPass;?>">
  <span class="error">* <?php echo $newPassErr;?></span> 
   <br><br>

  <span style = "display:inline-block; width:250px;text-align:right;"><b><span class="error">Retype New Password : </span></b></span> 
  <input type="password" name="reNewPass" value="<?php echo $reNewPass;?>">
  <span class="error">* <?php echo $reNewPassErr;?></span> 
   
  
  <br><br>
  <span style = "display:inline-block; width:430px;text-align:right;"><input type="submit" name="submit" value="Submit"> </span> 
</form>

</body>
</html>