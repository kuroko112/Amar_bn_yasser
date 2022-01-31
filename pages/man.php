<style>
button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width:100%;
}
.btn_blbutton1ock{
  width:100%;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}

#container{width:20%;
  margin:auto;
  height: 100%;
  
}

.backgound
{
  
  background-image: url("../layout/img/man4.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
 
}
.link a
{

  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 1px;
  transition-duration: 0.4s;
  cursor: pointer;
  width:100%;

}

.link a:hover
{
    background-color: #008CBA;
    color: white;
    text-decoration: none;
} 
</style>
<!-- <link rel="stylesheet" href="../layout/css/style.css"> -->





<div class="backgound">

  <?php 
    $db = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
    session_start();
    $admin_email = $_SESSION['username'];
    $query       = "SELECT * FROM `admins` WHERE admin_email='$admin_email'";
    $result      = mysqli_query($db, $query);
    $row         = mysqli_fetch_assoc($result);
    // print_r($_SESSION['username']. "<br>");
    // ------------------------------------------------------------------
    if(isset($_SESSION['username']) && $row['GropID'] == 1)
    {
        $email_admin = $_SESSION['username'];
        // echo $email_admin;
        $query    = "SELECT * FROM admins WHERE admin_email='$email_admin'";
        $result   = mysqli_query($db, $query);
        $row      = mysqli_fetch_assoc($result);
        $id_admin = $row['GropID'];
        ?>
      <div id="container">
            <h1 style="text-align:center;color:black"> مــــــــديــــــــر الــــمــــدرســــة</h1>
            <div class="link"> 
                <a href="admin/controllar.php"> تقارير خاصة ب شؤن عاملين</a>
                <a href=""> تقارير خاصة ب شؤن طلاب</a><br>
                <a href="../../logout.php">تــــــقــــريــــــر خاصة  التوريدات</a> 
                <a href="../logout.php">تـــــــــســـجــــيـــــــل الخروج</a> 
            </div>
        </div>
       
        
        <?php 
        
            
            
        ?>
    <?php } else {
            header("LOCATION: ../index.php");
        }

  ?>
</div>