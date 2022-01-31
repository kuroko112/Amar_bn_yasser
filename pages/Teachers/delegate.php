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

        background-color: white; 
        color: black; 
        border: 2px solid #008CBA;
        width:100% ;
        height: 50px;
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
    
?>


    <form action="" method="post" >
    <?php include('../../error.php'); ?>
        <h2>تسجيل ايام  (<?php echo $name?>)</h2>
        <label for=""> الاسم    </label>
        <input style="text-align:right;  width:100%;" type="text" name="" value="<?php echo $name?>"><br><br>
        <label for=""> المهمنة    </label>
        <input style="text-align:right;  width:100%;" type="text" name="" value="<?php echo $job?>"><br><br>
        <label for=""> الحالة    </label>
        <input style="text-align:right;  width:100%;" type="text" name="" value="<?php echo $org_com?>"><br><br>
        <label for="">الايام</label><br><br>
        <label for=""> الاحد    </label><input type="checkbox" name="day1"   id=""><br>
        <label for=""> الاثنان  </label><input type="checkbox" name="day2"   id=""> <br>
        <label for=""> الثلاثاء </label><input type="checkbox" name="day3"   id=""> <br>
        <label for=""> الاربعاء </label><input type="checkbox" name="day4"   id=""> <br>
        <label for=""> الخميس  </label><input type="checkbox" name="day5"   ld=""><br>
        <button  name="save" class="button2">سجل</button>
        <button  name="home" class="button2">رجوع</button>
    </form>

    <?php 
    
        if(isset($_POST['save']))
        {
            $day1 = $day2 = $day3 = $day4 = $day5 = 0;

            if(isset($_POST['day1']))
            {
                $day1 = 1;
                
            }
            if(isset($_POST['day2']))
            {
                $day2 = 1;
                
            } 

            if(isset($_POST['day3']))
            {
                $day3 = 1;
                
            } 

            if(isset($_POST['day4']))
            {
                $day3 = 1;
                
            } 

            if(isset($_POST['day5']))
            {
                $day5 = 1;
                
            } 
            

            $query  = "SELECT * FROM `delegate` WHERE tec_id='$tea_id'";
            
            $result = mysqli_query($db, $query);
            
            // $row    = mysqli_fetch_assoc($result);
            
            if(mysqli_num_rows($result) == 1)
            {
                array_push($errors,  ":موجود مسبقا");
                echo "NOT OK";
            }

            else
            {
                $query = "INSERT INTO `delegate`(`tec_id`, `sun`, `mon`, `tus`, `wen`, `thu`) 
                          VALUES ('$tea_id', '$day1', '$day2', '$day3', '$day4', '$day5')";
                mysqli_query($db, $query);
            }

        }

        if(isset($_POST['home']))
        {
            header("LOCATION: show_data.php");
            exit();
        }
        
    
    
    ?>




</body>
</html>