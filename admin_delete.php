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
        <?php
            include 'connectdb.php';
            $am_ID = $_GET['am_ID'];
            $sql = "delete from admin where am_ID='$am_ID'";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo 'ลบแล้ว';
            }else{
                echo 'ลบไม่ได้';
            }
            mysqli_close($conn);
        ?>
        <script type="text/javascript">
            window.location("admin_list.php");
        </script>
    </body>
</html>