<?php
if(isset($_POST['submit'])) 
{ 
 $servername = "localhost";
$uname = "root";
$pword = "";
$dbname = "information";
$db = new mysqli($servername, $uname, $pword, $dbname);
// Check connection
       if ($db->connect_error) {
  	die("Connection failed: " . $conn->connect_error);
	
       }
   // username and password sent from form 
      $myusername = $_POST["username"];
      $mypassword = $_POST["password"]; 
      $result=NULL;
      $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db, $sql);
   
      if ($result->num_rows > 0) {
                     echo "You are logged successfully";
                     }
	    else {
         echo "Your Login Name or Password is invalid";
         	     }
}
 ?>

                   <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                  <label>UserName  : </label><input type = "text" name = "username"  /><br /><br />
                  <label>Password  : </label><input type = "password" name = "password"  /><br /><br />
                  <input type = "submit" name="submit" value = "Submit "/><br />
                  </form>



