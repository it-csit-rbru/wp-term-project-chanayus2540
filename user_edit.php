<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1">
        <title>Project 6015261011</title>
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
                    <h4>แก้ไขข้อมูลผู้ใช้</h4>
                    <?php
                        $us_ID = $_REQUEST['us_ID'];
                        if(isset($_GET['submit'])){
                            $us_ID = $_GET['us_ID'];
                            $us_ttl_ID = $_GET['us_ttl_ID'];
                            $us_st_ID = $_GET['us_st_ID'];
                            $us_fname = $_GET['us_fname'];
                            $us_lname = $_GET['us_lname'];
                            $us_ic = $_GET['us_ic'];
                            $us_tel = $_GET['us_tel'];
                            $us_ad = $_GET['us_ad'];
                            $sql = "update userr set ";
                            $sql .= "us_fname='$us_fname',us_lname='$us_lname',us_ttl_ID='$us_ttl_ID',us_ic='$us_ic',us_tel='$us_tel',us_ad='$us_ad',us_st_ID='$us_st_ID' ";
                            $sql .="where us_ID='$us_ID' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลผู้ใช้  $us_fname $us_lname $us_ic $us_tel $us_ad  เรียบร้อยแล้ว<br>";
                            echo '<a href="user_list.php">แสดงรายชื่อผู้ใช้ทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="user_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hIDden" name="us_ID" ID="us_ID" value="<?php echo "$us_ID";?>">
                            <label for="us_ttl_ID" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="us_ttl_ID" ID="us_ttl_ID" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from userr where us_ID='$us_ID'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fus_fname = $row2['us_fname'];
                                    $fus_lname = $row2['us_lname'];
                                    $fus_ic = $row2['us_ic'];
                                    $fus_tel = $row2['us_tel'];
                                    $fus_ad = $row2['us_ad'];
                                    $fus_ttl_ID = $row2['us_ttl_ID'];
                                    $sql =  "SELECT * FROM title order by ttl_ID";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_ID'].'"';
                                        if($row['ttl_ID']==$fus_ttl_ID){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['ttl_Name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <input type="hIDden" name="us_ID" ID="us_ID" value="<?php echo "$us_ID";?>">
                            <label for="us_st_ID" class="col-md-2 col-lg-2 control-label">สถานะ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="us_st_ID" ID="us_st_ID" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from userr where us_ID='$us_ID'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fus_st_ID = $row2['us_st_ID'];
                                    $sql =  "SELECT * FROM statuss order by st_ID";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['st_ID'].'"';
                                        if($row['st_ID']==$fus_st_ID){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['st_Name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="us_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="us_fname" ID="us_fname" class="form-control" 
                                       value="<?php echo $fus_fname;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="us_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="us_lname" ID="us_lname" class="form-control" 
                                       value="<?php echo $fus_lname;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="us_ic" class="col-md-2 col-lg-2 control-label">เลขบัตรประชาชน</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="us_ic" ID="us_ic" class="form-control" 
                                       value="<?php echo $fus_ic;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="us_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="varchar" name="us_tel" ID="us_tel" class="form-control" 
                                       value="<?php echo $fus_tel;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="us_ad" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="us_ad" ID="us_ad" class="form-control" 
                                       value="<?php echo $fus_ad;?>">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
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