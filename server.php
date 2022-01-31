
<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors  = array();

if(isset($_SESSION['username']))
{
  if($_SESSION['username'] == 'Ahmed@gmail.com')
  {
    header("LOCATION: pages/man.php");
    exit();
  } elseif($_SESSION['username'] == 'samia@gmail.com') {
    header("LOCATION: pages/work.php");
    exit();
  } elseif($_SESSION['username'] == 'Jamal@gmail.com') {
    header("LOCATION: pages/student.php");
    exit();
  } elseif($_SESSION['username'] == 'Jasmine@gmail.com') {
    header("LOCATION: pages/imp_sed.php");
    exit();
  }
}

// connect to the database
$db = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username   = mysqli_real_escape_string($db, $_POST['username']);
  $email      = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $address    = mysqli_real_escape_string($db, $_POST['address']);
  $fullname    = mysqli_real_escape_string($db, $_POST['fullname']);
  //  Potential errors when fields are empty
  // by adding (array_push()) corresponding error into $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  } 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    // Query That Was Insert into YOUR Table 
  	$query = "INSERT INTO users (username, email, password, Address, fullname) 
  			  VALUES('$username', '$email', '$password', '$address', '$fullname')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    // edit New an acount 
    $query_user  = "SELECT * FROM users WHERE username = '$username'";
    $reuslt_user = mysqli_query($db, $query_user);
    $row_user = mysqli_fetch_assoc($reuslt_user);
    $id  = $row_user['UserID'];
    
    $query_acn = "INSERT INTO anc (id_useracn) VALUES ('$id')";
    // echo $query_acn;
    mysqli_query($db, $query_acn);
  	header('location: index.php');
  }
}





// LOGIN USER
if (isset($_POST['login_user'])) {
    $admin_email = mysqli_real_escape_string($db, $_POST['username']);
    $password    = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($admin_email)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_password='$password'";
        // echo $query;
        $results = mysqli_query($db, $query);
        $admin   = mysqli_fetch_assoc($results);
        // To Cheek IF The username Has Taken
        if (mysqli_num_rows($results) == 1) {
          if($admin['GropID'] == 1) {
            $_SESSION['username'] = $admin_email;
            $_SESSION['success'] = "You are now logged in";
            header("location: pages/man.php");
          } elseif ($admin['GropID'] == 2)  {
            $_SESSION['username'] = $admin_email;
            $_SESSION['success'] = "You are now logged in";
            header("location: pages/work.php");
          } elseif($admin['GropID'] == 3) {
            $_SESSION['username'] = $admin_email;
            $_SESSION['success'] = "You are now logged in";
            header("location: pages/student.php");
          } elseif($admin['GropID'] == 4) {
            $_SESSION['username'] = $admin_email;
            $_SESSION['success'] = "You are now logged in";
            header("location: pages/imp_sed.php");
          }
          $_SESSION['username'] = $admin_email;
          $_SESSION['success'] = "You are now logged in";
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    } 
  }



?>


