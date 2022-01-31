<?php 


$db = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
session_start();
$admin_email = $_SESSION['username'];
$query       = "SELECT * FROM `admins` WHERE admin_email='$admin_email'";
$result      = mysqli_query($db, $query);
$row         = mysqli_fetch_assoc($result);
if(isset($_SESSION['username']) && $row['GropID'] == 4)
{
    $email_admin = $_SESSION['username'];
    echo $email_admin;
    $query    = "SELECT * FROM admins WHERE admin_email='$email_admin'";
    $result   = mysqli_query($db, $query);
    $row      = mysqli_fetch_assoc($result);
    $id_admin = $row['GropID'];
    ?>
    <form action="" method="post">
        <button name="logout">تسجيل الخروج</button>
    </form>
    <?php 
    
        if(isset($_POST['logout']))
        {
            
            header("LOCATION: ../logout.php");
        }
    
    
    ?>
<?php } else {
        header("LOCATION: ../index.php");
    }

?>