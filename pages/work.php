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
#container{width:40%;
  margin:auto;
  height: 100%;
  
}
#left{float:left      ;width:200px;}
#right{float:right    ;width:200px;}
.backgound
{
  
  background-image: url("../layout/img/employee.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
 
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
    if(isset($_SESSION['username']) && $row['GropID'] == 2)
    {
        $email_admin = $_SESSION['username'];
        // echo $email_admin;
        $query    = "SELECT * FROM admins WHERE admin_email='$email_admin'";
        $result   = mysqli_query($db, $query);
        $row      = mysqli_fetch_assoc($result);
        $id_admin = $row['GropID'];
        ?>
      <div id="container">
        <h1 style="text-align:center;color:white">شؤن العاملين</h1>
        <form action="" method="post" class="center">
          <div id="left">
            <button name="Teachers_data" class="button2">تسجيل معلم جديد</button><br>
            <button name="days_attendance" class="button2"> المــــنــتــدبــيــن بالـــمـدرســة</button><br>
            <button name="org_data" class="button2">الاصــلــي بالـــمـدرســة</button><br>
            <button name="" class="button2">زيارة الموجة</button><br>
            <button name="" class="button2">الصادرات</button><br>
            <button name="show_all_data" class="button2">قوة المدرسة</button><br>
          </div>
          <div id="right">
            <button name="" class="button2">الواردات</button><br>
            <button name="er_day" class="button2">تقرير من تجاوز السبعة ايام</button><br>
            <button name="Teachers_vacation" class="button2">تسجيل الحضور و الغياب</button><br>
            <button name="" class="button2">تقرير الصادرات</button><br>
            <button name="" class="button2">تقرير  الورادات</button><br>
            <button name="Statistic" class="button2">الاحصائية</button><br>
        
          </div>
          <button name="logout"class="btn_blbutton1ock">تسجيل الخروج</button><br>
        </form>
      </div>
        <?php 
        
            if(isset($_POST['logout']))
            {
              header("LOCATION: ../logout.php");
              exit();
            }
            
            if(isset($_POST['Teachers_vacation']))
            {
              header("LOCATION: Teachers/holy_work.php");
              exit();
            }
            
            if(isset($_POST['Teachers_data']))
            {
              header("LOCATION: Teachers/new.php");
              exit();
            }
            if(isset($_POST['days_attendance']))
            {
              header("LOCATION: Teachers/show_data.php");
              exit();
            }
            if(isset($_POST['org_data']))
            {
              header("LOCATION: Teachers/show_org.php");
              exit();
            }
            if(isset($_POST['er_day']))
            {
              header("LOCATION: Teachers/error_day.php");
            }

            if(isset($_POST['show_all_data']))
            {
              header("LOCATION:  Teachers/all_data.php");
            }

            if(isset($_POST['Statistic']))
            {
              header("LOCATION: Teachers/Statistic_today.php");
            }
        
        ?>
    <?php } else {
            header("LOCATION: ../index.php");
        }

  ?>
</div>