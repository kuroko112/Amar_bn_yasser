<!DOCTYPE html>
<html style="text-align:right;">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>تسجيل ايام الحضور للمنتدبين بالمدرسة</title>
        <link rel="stylesheet" href="../../layout/css/style.css">
    </head>
    <style>
        p:hover, .item:hover i, .question:hover p, h1:hover, label:hover, input:hover::placeholder {
                    color: #8ebf42;
                }
                 input:hover,  select:hover,  textarea:hover {
                    border: 1px solid transparent;
                box-shadow: 0 0 8px 0 #8ebf42;
                color: #8ebf42;
                }
                .table-bordered:hover
                {
                    border: 1px solid transparent;
                    box-shadow: 0 0 8px 0 #8ebf42;
                    color: #8ebf42;
                }
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
                
                
                
                button {
                  background-color: white; 
                  color: black; 
                  border: 2px solid #008CBA;
                }
                
                button:hover {
                  background-color: #008CBA;
                  color: white;
                }
                
                
                
                
                
        </style>
   

    <body>

    <h1 style="text-align:center">قــــــــــــــوة الــــــــمـــــدرســـــــة </h1>    

    <?php 
    $db = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
    session_start();
    $admin_email = $_SESSION['username'];
    $query       = "SELECT * FROM `admins` WHERE admin_email='$admin_email'";
    $result      = mysqli_query($db, $query);
    $row         = mysqli_fetch_assoc($result);

    
    // print_r($_SESSION['username']. "<br>");
    if(isset($_SESSION['username']) && $row['GropID'] == 2)
    {
        $email_admin = $_SESSION['username'];
        // echo $email_admin . "<br>";
        $query        = "SELECT * FROM admins WHERE admin_email='$email_admin'";
        $result       = mysqli_query($db, $query);
        $row          = mysqli_fetch_assoc($result);
        $id_admin     = $row['GropID'];
        $query_data   = "SELECT * FROM teacher ORDER BY `teacher`.`teac_name` ASC";
        $result_data  = mysqli_query($db, $query_data);
        $count        = 0;
        ?>
        
        <link rel="stylesheet" href="../../layout/css/bootstrap.min.css">
        <table class="table table-bordered; text-align:right">
        
            <tr style="background:deepskyblue; color:white;">
                <td>حــــذف</td>
                <td>تــــــــعـــــــديـــــــــل</td>
                <td>حالة المعلم</td>
                <td>المادة </td>
                <td>الاسم</td>
            </tr>
        
            <?php
            while($row=mysqli_fetch_assoc($result_data))
            {   
                $count++;
                
                ?> 
                <tr>
				    <td><a href="hodor.php?id=<?php echo $row['tea_id']; ?>">حــــذف </a></td>
				    <td><a href="controllar.php?id=<?php echo $row['tea_id']; ?>">تــــــــعـــــــديـــــــــل </a></td>
				    <td> <?php echo $row['org_com']?> </td>
				    <td> <?php echo $row['teac_job']?> </td>
				    <td> <?php echo $row['teac_name']?> </td>
			    </tr>


            <?php }?>
            
            <tr style="background:deepskyblue; color:white;">
                <td colspan="5">
                    المجموع :                     <?php echo $count?>
                </td>
            </tr>
            

        </table>
        <form action="" method="post" class="link">
            <a href="../work.php">القائمة الرئيسية</a>
           <a href=" ../../logout.php">تسجيل الخروج</a>
        </form>


        <?php 
            



        } ?>





</body>
</html>
