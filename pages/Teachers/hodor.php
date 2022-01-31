<!DOCTYPE html>
<html style="text-align:right">
<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../layout/css/style.css">
    <title>تسجيل ايام الانتداب</title>
    <style>
        .button2 {
        transition:0.4s background;
        background-color: white; 
        color: black; 
        border: 2px solid #008CBA;
        width:100% ;
        height: 50px;
        cursor: pointer;
        }

        .button2:hover {
        background-color: #008CBA;
        color: white;
        }
    </style>
</head>
<body>
    
    <br><br>

<?php 

    $db          = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
    $tea_id      =  $_GET['id'];
    $query       = "SELECT * FROM `teacher` WHERE 	tea_id='$tea_id'";
    $result      = mysqli_query($db, $query);
    $row         = mysqli_fetch_assoc($result);
    $name        = $row['teac_name'] ;
    $job         = $row['teac_job' ] ;
    $org_com     = $row['org_com'  ] ;
    $errors  = array();
    // To get the date and time to save in my database
    $date = date('Y/m/d H:i:s');
    $date = date('d/m/Y h:i:sa', strtotime($date));
    $time_date = explode(' ',$date);
    $date_Today = $time_date[0];
    $Time_vac   = $time_date[1];
    $day =  date("l"); // select from database 
    // print_r($time_date);\
    $month = date("m");
    $type  = "";
?>


    <form action="" method="post" >
    <?php include('../../error.php'); ?>
        <h2>تسجيل حضور  (<?php echo $name?>)</h2>
        <label for=""> الاسم    </label>
        <input style="text-align:right;  width:100%;" type="text" name="" value="<?php echo $name?>"><br><br>
        <label for=""> المهمنة    </label>
        <input style="text-align:right;  width:100%;" type="text" name="" value="<?php echo $job?>"><br><br>
        <label for=""> الحالة    </label>
        <input style="text-align:right;  width:100%;" type="text" name="" value="<?php echo $org_com?>"><br><br>
        <label for="">نوع الاجازة</label><br><br>
        <label for=""> عرضة    </label>  <input type="radio"   name="type_holy" <?php if (isset($type) && $type=="type_day") echo "checked";?> value="عرضة"><br>
        <label for=""> اعتيادي  </label> <input type="radio"   name="type_holy" <?php if (isset($type) && $type=="type_day") echo "checked";?> value="اعتيادي"><br>
        <label for=""> مرضي </label>     <input type="radio"   name="type_holy" <?php if (isset($type) && $type=="type_day") echo "checked";?> value="مرضي"><br> 
        <label for=""> انتداب  </label>   <input type="radio"   name="type_holy" <?php if (isset($type) && $type=="type_day") echo "checked";?> value="انتداب"><br>
        <label for=""> حضر  </label>   <input type="radio"   name="type_holy" <?php if (isset($type) && $type=="type_day") echo "checked";?>    value="حضر"><br>
        
        <button  name="save" class="button2">سجل</button>
        <button  name="home" class="button2">رجوع</button>
    </form>

    <?php 
    
        if(isset($_POST['save']))
        {
            $type_vec   = "";
           @$type_vec   = $_POST['type_holy'];

            $query      = "SELECT * FROM `vacations` WHERE `teac_id`='$tea_id' AND `date_Today`='$time_date[0]'";
            
            $result = mysqli_query($db, $query);
            
            // $row    = mysqli_fetch_assoc($result);
            echo mysqli_num_rows($result);
            if(mysqli_num_rows($result) > 1)
            {
                array_push($errors,  ":موجود مسبقا");
                echo "NOT OK";
            }

            else
            {
                echo "OK";
                $query = "INSERT INTO `vacations`( `date_Today`, `day_vac`, `Time_vac` , `type_vec` , `teac_id`, `month`) 
                                          VALUES ('$date_Today', '$day'   , '$Time_vac', '$type_vec' , '$tea_id', '$month')";
                mysqli_query($db, $query);

                $query  = "SELECT * FROM vacations 

                        JOIN teacher ON teacher.tea_id = vacations.teac_id
                        
                        WHERE teacher.tea_id = '$tea_id'";
                $result     = mysqli_query($db, $query);

                $Total_3rda = $Total_marady = $Total_e3tidy = 0;
                
                while($row  = mysqli_fetch_assoc($result))
                {
                    $Total_3rda     += $row['Total_3rda'];
                    $Total_marady   += $row['Total_marady'];
                    $Total_e3tidy   += $row['Total_e3tidy'];

                    if($row['type_vec'] == 'اعتيادي'){
                        $Total_e3tidy ++;
                    } elseif ($row['type_vec'] == 'عرضة') {

                        $Total_3rda++;
                        
                    } elseif ($row['type_vec'] == 'مرضي') {
                        
                        $Total_marady ++;
                    } 
                }

                $query      = "UPDATE `teacher` 
                                SET `Total_3rda`    ='$Total_3rda', 
                                    `Total_marady`  ='$Total_marady', 
                                    `Total_e3tidy`  ='$Total_e3tidy'
                                WHERE `tea_id`=$tea_id";
                // echo $query ;
                mysqli_query($db, $query);

            }

        }

        if(isset($_POST['home']))
        {
            header("LOCATION: holy_work.php");
            exit();
        }
        
    
    
    ?>




</body>
</html>