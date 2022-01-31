<?php 

    $db  = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
    // To get the date and time to save in my database
    $date = date('Y/m/d H:i:s');
    $date = date('d/m/Y h:i:sa', strtotime($date));
    $time_date = explode(' ',$date);
    $date_Today = $time_date[0];
    $Time_vac   = $time_date[1];
    $day =  date("l"); // select from database 
    // print_r($time_date);

    // ------------------------------- عرضة ---------------------------------

    $query = "SELECT * FROM `vacations` 
    JOIN teacher ON teacher.tea_id = vacations.teac_id
    WHERE vacations.type_vec='عرضة' AND vacations.date_Today='$date_Today' ";
    $result = mysqli_query($db, $query);
    $count_3rda =  mysqli_num_rows($result);
    
    // ------------------------------ منتدب -----------------------------

    $query = "SELECT * FROM `vacations` 
    JOIN teacher ON teacher.tea_id = vacations.teac_id
    WHERE vacations.type_vec='انتداب' AND vacations.date_Today='$date_Today' ";
    $result = mysqli_query($db, $query);
    $count_com =  mysqli_num_rows($result);

    // ------------------------اعتيدادي---------------------------
    
    $query = "SELECT * FROM `vacations` 
    JOIN teacher ON teacher.tea_id = vacations.teac_id
    WHERE vacations.type_vec='اعتيادي' AND vacations.date_Today='$date_Today' ";
    $result = mysqli_query($db, $query);
    $count_a3tid =  mysqli_num_rows($result);
    
    // ------------------------------  مرضي  ----------------------------------
    
    $query = "SELECT * FROM `vacations` 
    JOIN teacher ON teacher.tea_id = vacations.teac_id
    WHERE vacations.type_vec='مرضي' AND vacations.date_Today='$date_Today' ";
    $result = mysqli_query($db, $query);
    $count_mrdi =  mysqli_num_rows($result);

    // --------------- قوة المدرسة ------------------------------------------
    $query  ="SELECT * FROM teacher";
    $result = mysqli_query($db, $query);
    $total      = mysqli_num_rows($result);
    // echo $total;

    $hodor      = $total - ($count_mrdi + $count_a3tid + $count_com + $count_3rda);
    // echo "Total " . $total         . "<br>";
    // echo "mardi " . $count_mrdi    . "<br>";
    // echo "a3tid " . $count_a3tid   . "<br>";
    // echo "com   " . $count_com     . "<br>";
    // echo $hodor;

    if($day == "Saturday")
    {
        $day = "السبت";
    }

    if($day == "Sunday")
    {
        $day = "الاحد";
    }
    if($day == "Monday")
    {
        $day = "الاثنين";
    }
    if($day == "Tuesday")
    {
        $day = "الثلاثاء";
    }

    if($day == "Wednesday")
    {
        $day = "الاربعاء";
    }
    if($day == "Thursday")
    {
        $day = "الخميس";
    }






?>



<!DOCTYPE html>
<html style="text-align:right">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../layout/css/style.css">
        <title>احصاء اليومية</title>
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
        <p class="header2">محافظة القليوبية
        <br>ادارة العبور
        <br>        مدرسة عمار بن ياسر بنون</p>

        <h1 style="text-align: center;">احصائية شؤن عاملين يوم / <?php echo $day?> الموفق / <?php echo $date_Today?></h1>

        <link rel="stylesheet" href="../../layout/css/bootstrap.min.css">
        <table class="table table-bordered; text-align:right">
        
            <tr style="background:deepskyblue; color:white;">
                <td style="font-size: 15px;">حـــضــور</td>
                <td style="font-size: 15px;">مرضي</td>
                <td style="font-size: 15px;">اعتيادي</td>
                <td style="font-size: 15px;">عــــارضــة</td>
                <td style="font-size: 15px;">منتدب </td>
                <td style="font-size: 15px;">مقــــيــد</td>
            </tr>

            <tr>

                <td style="font-size: 15px;"><?php echo $hodor?></td>
                <td style="font-size: 15px;"><?php echo $count_mrdi?></td>
                <td style="font-size: 15px;"><?php echo $count_a3tid?></td>
                <td style="font-size: 15px;"><?php echo $count_3rda?></td>
                <td style="font-size: 15px;"><?php echo $count_com?></td>
                <td style="font-size: 15px;"><?php echo $total?></td>
            </tr>


        </table><br><br><br><br><br><br>
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