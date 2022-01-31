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
    // echo $email_admin;
    $query    = "SELECT * FROM admins WHERE admin_email='$email_admin'";
    $result   = mysqli_query($db, $query);
    $row      = mysqli_fetch_assoc($result);
    $id_admin = $row['GropID'];
    ?>
        <!DOCTYPE html>
        <html>
          <head>
            <title>Account registration form</title>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
            <style>
              html, body {
              min-height: 100%;
              }
              body, div, form, input, select, p { 
              padding: 0;
              margin: 0;
              outline: none;
              font-family: Roboto, Arial, sans-serif;
              font-size: 14px;
              color: #666;
              }
              h1 {
              margin: 0;
              font-weight: 400;
              }
              h3 {
              margin: 12px 0;
              color: #8ebf42;
              }
              .main-block {
              display: flex;
              justify-content: center;
              align-items: center;
              background: #fff;
              }
              form {
              width: 100%;
              padding: 20px;
              }
              fieldset {
              border: none;
              border-top: 1px solid #8ebf42;
              }
              .account-details, .personal-details {
              display: flex;
              flex-wrap: wrap;
              justify-content: space-between;
              }
              .account-details >div, .personal-details >div >div {
              display: flex;
              align-items: center;
              margin-bottom: 10px;
              }
              .account-details >div, .personal-details >div, input, label {
              width: 100%;
              }
              label {
              padding: 0 5px;
              text-align: right;
              vertical-align: middle;
              }
              input {
              padding: 5px;
              vertical-align: middle;
              }
              .checkbox {
              margin-bottom: 10px;
              }
              select, .children, .gender, .bdate-block {
              width: calc(100% + 26px);
              padding: 5px 0;
              }
              select {
              background: transparent;
              }
              .gender input {
              width: auto;
              } 
              .gender label {
              padding: 0 5px 0 0;
              } 
              .bdate-block {
              display: flex;
              justify-content: space-between;
              }
              .birthdate select.day {
              width: 50px;
              }
              .birthdate select.mounth {
              width: calc(100% - 94px);
              }
              .birthdate input {
              width: 38px;
              vertical-align: unset;
              }
              .checkbox input, .children input {
              width: auto;
              margin: -2px 10px 0 0;
              }
              .checkbox a {
              color: #8ebf42;
              }
              .checkbox a:hover {
              color: #82b534;
              }
              button {
              width: 100%;
              padding: 10px 0;
              margin: 10px auto;
              border-radius: 5px; 
              border: none;
              background: #8ebf42; 
              font-size: 14px;
              font-weight: 600;
              color: #fff;
              }
              button:hover {
              background: #82b534;
              }
              @media (min-width: 568px) {
              .account-details >div, .personal-details >div {
              width: 50%;
              }
              label {
              width: 40%;
              }
              input {
              width: 60%;
              }
              select, .children, .gender, .bdate-block {
              width: calc(60% + 16px);
              }
              }
               p:hover, .item:hover i, .question:hover p, h1:hover, label:hover, input:hover::placeholder {
                    color: #8ebf42;
                }
                 input:hover,  select:hover,  textarea:hover {
                    border: 1px solid transparent;
                box-shadow: 0 0 8px 0 #8ebf42;
                color: #8ebf42;
                }
            </style>
          </head>
          <body>
            <div class="main-block">
            <form action="insert_tec.php" method="POST">
              <h1 style="text-align:center;">تسجيل معلم جديد</h1>
              <fieldset>
                <legend>
                  <h3>البيانات الاساسية</h3>
                </legend>
                <div  class="account-details">
                  <div><label>الاسم</label><input type="text" name="teac_name" ></div>
                  <div>
                      <label>الوظيفية</label>  
                      <select name="teac_job">
                        <option value=""></option>
                        <option value="" style="background-color:yellow;color:black">معلمي العربي</option>
                        <option value="عربي">عربي</option>
                        <option value="دين">دين</option>
                        <option value="" style="background-color:yellow;color:black">معلمي اللغة الثانية</option>
                        <option value="انجليزي">انجليزي</option>
                        <option value="فرنساوي">فرنساوي</option>
                        <option value="الماني">الماني</option>
                        <option value="" style="background-color:yellow;color:black">معلمين الرياضيات</option>
                        <option value="رياضيات">رياضيات</option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="فزياء">فزياء</option>
                        <option value="كمياء">كمياء</option>
                        <option value="احياء">احياء</option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="جغرفيا">جغرفيا</option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="تاريخ">تاريخ</option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="علم نفس">علم نفس</option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="فلسفة">فلسفة/موطنة</option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="حاسب الالي">حاسب الالي</option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="اخصائي اجتمعاي">اخصائي اجتماعي</option>
                        <option value="اخصائي نفسي">اخصائي نفسي</option>
                        <option value="اخصائي تطوير">اخصائي تطوير</option>
                        <option value="اخصائي صحافي">اخصائي صحافي</option>
                        <option value="اخصائي مكتبات">اخصائي مكتبات</option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="اداري">اداري </option>
                        <option value="" style="background-color:yellow;color:black"></option>
                        <option value="عمال">عمال </option>

                      </select>
                  </div>
                  
                  <div><label>العنوان</label><input         type="text" name="teac_address"  ></div>
                  <div><label>الرقم القومي</label><input    type="text" name="national_id"   ></div>
                  <div><label>الموبيل</label><input         type="text" name="teac_phone"    ></div>
                  
                  <div><label>درجة المعلم</label>
                   <select name="tea_grade">
                      <option value=""></option>
                      <option value="معلم">معلم</option>
                      <option value="معلم اول">معلم اول </option>
                      <option value="معلم اول أ">معلم اول أ</option>
                      <option value="معلم خبير">معلم خبير</option>
                      <option value="معلم كبير">معلم كبير</option>
                    </select>
                 </div>
                
                 <div><label>حالة المعلم</label>
                  <select name="org_com">
                      <option value=""></option>
                      <option value="اصلي">اصلي</option>
                      <option value="منتدب">منتدب</option>         
                    </select>
                 </div>
                




                </div>
              </fieldset>
              
              <fieldset>
                <legend>
                  <h3>التاريخ</h3>
                </legend>
                <div  class="personal-details">
                  <div>
                      
                    <div class="birthdate">
                      <label>تاريخ تعين</label>
                      <div class="bdate-block">
                        <select class="day"  name="day_hiring">
                          <option value="">اليوم</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                        <select class="mounth" name="mounth_hiring" >
                          <option value="">الشهر</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                        <input type="text" name="year_hiring"  placeholder="السنة">
                      </div>
                    </div>

                    <div class="birthdate">
                      <label>تاريخ اخر ترقية</label>
                      <div class="bdate-block">
                        <select class="day"  name="day_up">
                          <option value="">اليوم</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                        <select class="mounth" name="mounth_up" >
                          <option value="">الشهر</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                        <input type="text" name="year_up"  placeholder="السنة">
                      </div>
                    </div>
                    

                   </div>

                  
                  <div>
                    
                    <div class="birthdate">
                      <label>تاريخ الميلاد</label>
                      <div class="bdate-block">
                        <select class="day"  name="day">
                          <option value="">اليوم</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                        <select class="mounth" name="mounth" >
                        <option value="">الشهر</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                        <input type="text" name="year"  placeholder="السنة">
                      </div>
                    </div>
                    

                    <div class="birthdate">
                      <label>تاريخ التعين الفعلي</label>
                      <div class="bdate-block">
                        <select class="day"  name="day_work">
                          <option value="">اليوم</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                        <select class="mounth" name="mounth_work" >
                          <option value="">الشهر</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                        <input type="text" name="year_work"  placeholder="السنة">
                      </div>
                    </div>


                    
                  </div>

                </div>
              </fieldset>
              
              <button type="submit" name="save">Submit</button>
              <button type="submit" name="Home"   >القائمة الرئيسية</button>
              <button type="submit" name="logout" >تسجيل الخروج</button>
            </form>
        </div> 
            
          </body>
        </html>
        
    
<?php 

                


} else {
        header("LOCATION: ../../index.php");
        exit();
    }

?>

