<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php

$name = $email = $passwd = $pcode = $dob = $pno = $url = "";
$nameErr = $emailErr = $urlErr= $pErr = $phErr = $piErr = $dobErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
    if (empty($_POST["password"])) {
    $pErr = "Passowrd is required";
  } else {
    $passwd = test_input($_POST["password"]);
    if (strlen($_POST["password"]) <= '8') {
            $pErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$passwd)) {
            $pErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$passwd)) {
            $pErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$passwd)) {
            $pErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
    } 
  
    
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["url"])) {
    $url = "";
  } else {
    $url = test_input($_POST["url"]);
    
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/)|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $urlErr = "Invalid URL";
    }
  }
 if (empty($_POST["pincode"])) {
    $pcode = "";
  } else {
    $pcode = test_input($_POST["pincode"]);
    
    if (!preg_match("/^[0-9]*$/",$pcode)) {
      $piErr = "Only numbers are allowed";
    }
  }
 if (empty($_POST["phone_number"])) {
    $pno = "";
  } else {
    $pno = test_input($_POST["phone_number"]);
    
    if (!preg_match("/^[0-9 ]*$/",$pno)) {
      $phErr = "Only numbers allowed";
    }
  }
 if (empty($_POST["date_of_birth"])) {
    $dob = "";
  } else {
    $dob = test_input($_POST["date_of_birth"]);
    
    if(!preg_match("/^(0?[1-9]|[12][0-9]|3[01])\/\.- \/\.- \d{2}$/", $dob)) {
      $dobErr= "invalid format";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation </h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $passwd;?>">
  <span class="error">* <?php echo $pErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  URL: <input type="text" name="url" value="<?php echo $url;?>">
  <span class="error"><?php echo $urlErr;?></span>
  <br><br>
  Pincode: <input type="text" name="pincode" value="<?php echo $pcode;?>">
  <span class="error"><?php echo $piErr;?></span>
  <br><br>
  Date of Birth: <input type="text" name="date_of_birth" value="<?php echo $dob;?>" >
  <span class="error"><?php echo $dobErr;?></span>
  <br><br>
  Phone Number: <input type="text" name="phone_number" value="<?php echo $pno;?>">
  <span class="error"><?php echo $phErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $url;
echo "<br>";
echo $pcode;
echo "<br>";
echo $dob;
echo "<br>";
echo $pno;

?>

</body>
</html>