<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project 6015261011</title>
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
                <h4>แก้ไขข้อมูลรุ่นกล้อง</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $gn_ID     = $_GET['gn_ID'];
                        $gn_Name   = $_GET['gn_Name'];
                        $sql        = "update generation set gn_Name='$gn_Name' where gn_ID='$gn_ID'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไข $gn_Name เรียบร้อยแล้ว<br>";
                        echo '<a href="generation_list.php">แสดงรุ่นกล้องทั้งหมด</a>';
                    }else{
                        $fgn_ID = $_REQUEST['gn_ID'];
                        $sql =  "SELECT * FROM generation where gn_ID='$fgn_ID'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fgn_Name = $row['gn_Name'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="generation_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="gn_ID" id="gn_ID" value="<?php echo "$fgn_ID";?>">
                        <div class="form-group">
                            <label for="gn_Name" class="col-md-2 col-lg-2 control-label">รุ่นกล้อง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="gn_Name" id="gn_Name" class="form-control" value="<?php echo "$fgn_Name";?>">
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
