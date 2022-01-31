<!DOCTYPE html>
<html style="text-align: right;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../layout/css/style.css">

    <title>تــــــقــــريــــــر مــــــن تـــجاوز السبعة ايام</title>
    <style>
            .container{
                    width:100%;
                    margin:0;
                    height: 100%;
                    }
                    .left {float:left      ;width: 200px;}
                    .center{margin:0 auto  ;width:100px;}
                    .right{float:right     ;width:200px;}
        </style>
</head>
<body>
    




<?php 

    $db    = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
    



    
    // To get the date and time to save in my database
    $date = date('Y/m/d H:i:s');
    $date = date('d/m/Y h:i:sa', strtotime($date));
    $time_date = explode(' ',$date);
    $date_Today = $time_date[0];
    $Time_vac   = $time_date[1];
    $day =  date("l"); // select from database 
    // print_r($time_date);\
    $month = date("m");
    $query = "SELECT * FROM teacher WHERE `org_com`='اصلي'";
    $result = mysqli_query($db, $query);
    $count_day  = 0; 
    $name       = array();
    $number     = array();
    ?>
    
    <p class="header2">محافظة القليوبية
            <br>ادارة العبور
            <br>        مدرسة عمار بن ياسر بنون</p>
<h1 style="text-align: center;">تــــــقــــريــــــر مــــــن تـــجاوز السبعة ايام</h1>

<link rel="stylesheet" href="../../layout/css/bootstrap.min.css">
        <table class="table table-bordered; text-align:right">
        
            <tr style="background:deepskyblue; color:white;">
                <td>تــــاريــــخ العارضة</td>
                <td>عـــــــداد ايــــــام التجاوز</td>
                <td>حالة المعلم</td>
                <td>المادة </td>
                <td>الاسم</td>
            </tr>


    <?php while($row = mysqli_fetch_assoc($result))
    {
        
        ?>


        <?php $id = $row['tea_id'];
        // echo $id;
        $query_data = "SELECT * FROM `vacations`
        JOIN teacher ON vacations.teac_id = teacher.tea_id 
        WHERE teacher.org_com = 'اصلي'  
        AND teacher.tea_id = '$id' 
        AND vacations.month='$month'
        AND vacations.type_vec='عرضة'
        ";
        $result_data = mysqli_query($db, $query_data);
        ?>
        <?php while($row_data = mysqli_fetch_assoc($result_data))
        {
            $count      = mysqli_num_rows($result_data);
            if($count >= 7)
            {   
                // echo "<pre>";
                // print_r($row_data);
                // echo "</pre>";
                ?>
            <tr>
                <td><?php echo $row_data['date_Today']?></td>
                <td><?php echo $count?></td>
                <td><?php echo $row_data['org_com']?></td>
                <td><?php echo $row['teac_job']?></td>
                <td><?php echo $row['teac_name']?></td>
            </tr>
            
            
            <?php } else 
            {
                $count = 0 ;?>
            <?php }
        }?>
        
        <tr style="background:deepskyblue; color:white;">
            <td colspan="5"></td>
        </tr>
        
        <?php } ?>

        </table><br><br><br><br>
            <div class="container">
                <div class="right">
                    <h3 >شؤن عاملين </h3>
                </div>
                <div class="left">
                    <h3 >مدير المدرسة</h3>
                </div>
            </div>

</body>
</html>