<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project 6015261003</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
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
                <h4>แก้ไขข้อมูลสถานะเช่า</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $st_ID     = $_GET['st_ID'];
                        $st_Name   = $_GET['st_Name'];
                        $sql        = "update statuss set st_Name='$st_Name' where st_ID='$st_ID'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไข $st_Name เรียบร้อยแล้ว<br>";
                        echo '<a href="status_list.php">แสดงสถานะเช่าทั้งหมด</a>';
                    }else{
                        $fst_ID = $_REQUEST['st_ID'];
                        $sql =  "SELECT * FROM statuss where st_ID='$fst_ID'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fst_Name = $row['st_Name'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="status_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="st_ID" id="st_ID" value="<?php echo "$fst_ID";?>">
                        <div class="form-group">
                            <label for="st_Name" class="col-md-2 col-lg-2 control-label">ชื่อสถานะเช่า</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="st_Name" id="st_Name" class="form-control" value="<?php echo "$fst_Name";?>">
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
