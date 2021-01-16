<?php
if(isset($_POST['submit'])) 
{ 
  $s_name="localhost";
  $u_name="root";
  $pasword="";
  $db="information";
  $con=mysqli_connect($s_name,$u_name,$pasword,$db);
  if($con->connect_error){
    die("connection failed: " . $con->connect_error);
  }

  $sub=$_POST['submit'];
  $id=$_POST['empid'];
  $name=$_POST['empname'];
  $basic=$_POST['basic'];
   $lic=$_POST['lic'];
  $da=110 * $basic /100;
  $hra=20 * $basic/100;
  $tax= 30 * $basic/100; 
  



	$query="INSERT INTO employee VALUES ('$id','$name','$basic','$da','$hra','$tax','$lic')";
	
      $result = mysqli_query($con,$query);
      	
      if (isset($result)) {
                  echo "Success";
      }else {
         
         echo "error";
         }
}
?>


<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <label> Enter Employee Id :<label /><input type="text" name="empid"><br> <br>
        <label> Enter Employee Name :<label /><input type="text" name="empname"><br><br>
        
        <label> Enter Basic Salary : <label /><input type="text" name="basic"><br><br>
        <label> Enter LIC : <label /><input type="text" name="lic"><br><br>
        <input type = "submit" name="submit" value = "Submit "/><br />
  </form>



 