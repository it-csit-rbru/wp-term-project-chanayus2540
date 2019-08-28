<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta Name="viewport" content="wIDth=device-wIDth, initial-scale=1">
        <title>Project 6015261003</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include indivIDual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: cornflowerblue;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>เพิ่มข้อมูลผู้ใช้</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $us_ttl_ID = $_GET['us_ttl_ID'];
                            $us_fName = $_GET['us_fName'];
                            $us_lName = $_GET['us_lName'];
                            $us_ic = $_GET['us_ic'];
                            $us_tel = $_GET['us_tel'];
                            $us_ad = $_GET['us_ad'];
                            $sql = "insert into user";
                            $sql .= " values (null ,'$us_fName','$us_lName','$us_ttl_ID','$us_ic','$us_tel','$us_ad',)";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มผู้ใช้  $us_ttl_ID $us_fName $us_lName $us_ic $us_tel $us_ad เรียบร้อยแล้ว<br>";
                            echo '<a href="user_list.php">แสดงรายชื่อผู้ใช้ทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" Name="user_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="us_ttl_ID" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select Name="us_ttl_ID" ID="us_ttl_ID" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM title order by ttl_ID';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_ID'] . '">';
                                        echo $row['ttl_Name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="us_fName" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" Name="us_fName" ID="us_fName" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="us_lName" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" Name="us_lName" ID="us_lName" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="us_ic" class="col-md-2 col-lg-2 control-label">เลขบัตรประชาชน</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" Name="us_ic" ID="us_ic" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="us_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" Name="us_tel" ID="us_tel" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="us_ad" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" Name="us_ad" ID="us_ad" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" Name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div> 
                    </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
            <div class="row">
                <address>คณะคอมพิวเตอร์ศึกษาปี 2 </address>
            </div>
        </div>    
    </body>
</html>