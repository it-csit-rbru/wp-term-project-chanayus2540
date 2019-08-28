<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1">
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
                    <h4>แก้ไขข้อมูลแอดมิน</h4>
                    <?php
                        $am_ID = $_REQUEST['am_ID'];
                        if(isset($_GET['submit'])){
                            $am_ID = $_GET['am_ID'];
                            $am_ttl_ID = $_GET['am_ttl_ID'];
                            $am_fname = $_GET['am_fname'];
                            $am_lname = $_GET['am_lname'];
                            $am_ic = $_GET['am_ic'];
                            $am_tel = $_GET['am_tel'];
                            $am_ad = $_GET['am_ad'];
                            $sql = "update admin set ";
                            $sql .= "am_fname='$am_fname',am_lname='$am_lname',am_ttl_ID='$am_ttl_ID',am_ic='$am_ic',am_tel='$am_tel',am_ad='$am_ad' ";
                            $sql .="where am_ID='$am_ID' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลแอดมิน $am_fname $am_lname เรียบร้อยแล้ว<br>";
                            echo '<a href="admin_list.php">แสดงรายชื่อแอดมินทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="admin_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hIDden" name="am_ID" ID="am_ID" value="<?php echo "$am_ID";?>">
                            <label for="am_ttl_ID" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="am_ttl_ID" ID="am_ttl_ID" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from admin where am_ID='$am_ID'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fam_fname = $row2['am_fname'];
                                    $fam_lname = $row2['am_lname'];
                                    $fam_ic = $row2['am_ic'];
                                    $fam_tel = $row2['am_tel'];
                                    $fam_ad = $row2['am_ad'];
                                    $fam_ttl_ID = $row2['am_ttl_ID'];
                                    $sql =  "SELECT * FROM title order by ttl_ID";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_ID'].'"';
                                        if($row['ttl_ID']==$fam_ttl_ID){
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
                            <label for="am_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="am_fname" ID="am_fname" class="form-control" 
                                       value="<?php echo $fam_fname;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="am_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="am_lname" ID="am_lname" class="form-control" 
                                       value="<?php echo $fam_lname;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="am_ic" class="col-md-2 col-lg-2 control-label">เลขบัตรประชาชน</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="am_ic" ID="am_ic" class="form-control" 
                                       value="<?php echo $fam_ic;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="am_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="varchar" name="am_tel" ID="am_tel" class="form-control" 
                                       value="<?php echo $fam_tel;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="am_ad" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="am_ad" ID="am_ad" class="form-control" 
                                       value="<?php echo $fam_ad;?>">
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