<?php

                
    echo "<pre>";
    print_r($_GET);
    $db                     = mysqli_connect('localhost', 'root', '789456123258', 'amar_bn_yasser');
    $tea_id                 =  $_GET['id'];
    
    $name                   = $_GET['teac_name'] ;
    $job                    = $_GET['teac_job' ] ;
    $org_com                = $_GET['org_com'  ] ;
    $teac_phone             = $_GET['teac_phone'];
    $teac_address           = $_GET['teac_address'];
    $national_id            = $_GET['national_id'];
    $tea_grade              = $_GET['tea_grade'];
    echo "<pre>";
    $birthday     = $_GET['day']            . "/" . $_GET['mounth']             . "/" . $_GET['year'];
    $date_work    = $_GET['day_work']       . "/" . $_GET ['mounth_work']       . "/" . $_GET['year_work'];
    $date_hiring  = $_GET['day_hiring']     . "/" . $_GET['mounth_hiring']      . "/" . $_GET['year_hiring'];
    $date_up      = $_GET['day_up']         . "/" . $_GET['mounth_up']          . "/" . $_GET['year_up'];
    

             $query = "UPDATE `teacher` 
                              SET `teac_name`     ='$name',  
                                  `teac_phone`    ='$teac_phone', 
                                  `teac_address`  ='$teac_address', 
                                  `teac_job`      ='$job', 
                                  `birthday`     = '$birthday' , 
                                  `date_hiring`   ='$date_hiring' , 
                                  `date_work`     ='$date_work', 
                                  `date_up`       ='$date_up', 
                                  `org_com`       ='$org_com', 
                                  `national_id`   ='$national_id', 
                                  `tea_grade`     ='$tea_grade' 
                                  WHERE `tea_id`  ='$tea_id'";
                    mysqli_query($db, $query);
                    
                    header("LOCATION: update_org.php?id=$tea_id");
        
        
        ?>