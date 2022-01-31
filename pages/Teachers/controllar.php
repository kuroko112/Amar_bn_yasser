
<?php 

    $db          = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
    $tea_id      =  $_GET['id'];
    $query       = "SELECT * FROM `teacher` WHERE 	tea_id='$tea_id'";
    $result      = mysqli_query($db, $query);
    $row         = mysqli_fetch_assoc($result);
    $name        = $row['teac_name'] ;
    $job         = $row['teac_job' ] ;
    $org_com     = $row['org_com'  ] ;
    
    if($org_com == "منتدب")
    {
        header("location: update_com.php?id=$tea_id");
        
    } else {
        header("location: update_org.php?id=$tea_id");
    }
?>