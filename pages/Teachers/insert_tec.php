<?php 

    session_start();
    // to get a admin ID
    $db = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
    $admin_email = $_SESSION['username'];
    $query       = "SELECT * FROM `admins` WHERE admin_email='$admin_email'";
    $result      = mysqli_query($db, $query);
    $row_admin   = mysqli_fetch_assoc($result);
    $admin_id    =  $row_admin['admin_id'];

  

        if(isset($_POST['save']))
        {
            header("LOCATION: insert_tec.php");
            echo "<pre>";
        
            print_r($_POST);
        
            echo "</pre>";
        
            
                // varible to save all data
                $teac_name      = $_POST['teac_name'];
                $teac_job       = $_POST['teac_job'];
                $teac_address   = $_POST['teac_address'];
                $national_id    = $_POST['national_id'];
                $teac_phone     = $_POST['teac_phone'];
                $tea_grade      = $_POST['tea_grade'];
                $org_com        = $_POST['org_com'];
                $day_hiring     = $_POST['day_hiring'];
                $mounth_hiring  = $_POST['mounth_hiring'];
                $year_hiring    = $_POST['year_hiring'];
                $day_up         = $_POST['day_up'];
                $mounth_up      = $_POST['mounth_up'];
                $year_up        = $_POST['year_up'];
                $day_work       = $_POST['day_work'];
                $mounth_work    = $_POST['mounth_work'];
                $year_work      = $_POST['year_work'];
                
                $birthday        = $_POST['day']  ."/" . $_POST['mounth'] ."/"  .$_POST['year'] ;
                $date_hiring     = $day_hiring    ."/" . $mounth_hiring   ."/"  .$year_hiring;
                $date_work       = $day_work      ."/" . $mounth_work     ."/"  .$year_work;
                $date_up         = $day_up        ."/" . $mounth_up       ."/"  .$year_up;
            
                $query           = "INSERT INTO teacher (`admin_id`,   `teac_name`, `teac_phone`,  `teac_address`, `teac_job`,  `birthday`,   `date_hiring`, `date_work`,   `date_up`, `org_com`, `national_id`, `tea_grade`) 
                                        VALUES          ('$admin_id', '$teac_name', '$teac_phone', '$teac_address', '$teac_job', '$birthday', '$date_hiring', '$date_work', '$date_up', '$org_com', '$national_id', '$tea_grade') ";
                mysqli_query($db, $query);
                header("LOCATION: new.php");
        }


        if(isset($_POST['logout']))
        {
          header("LOCATION: ../../logout.php");
          exit();
        }
        if(isset($_POST['Home']))
        {
          header("LOCATION: ../work.php");
          exit();
        }
    
    
  



    

?>