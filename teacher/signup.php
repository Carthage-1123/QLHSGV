<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

//code for Signp
if(isset($_POST['submit'])) 
  {
    $fname=$_POST['fname'];
    $emailid=$_POST['emailid'];
    $phoneno=$_POST['mobileno'];
    $password=md5($_POST['password']);
    //Checking if emailor mobile already registered
    $query =$dbh->prepare("SELECT ID FROM tblteacher WHERE Email=:emailid and MobileNumber=:phoneno");
    $query-> bindParam(':emailid', $emailid, PDO::PARAM_STR);
    $query-> bindParam(':phoneno', $phoneno, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
echo "<script>alert('Địa chỉ Email hoặc số điện thoại đã được đăng kí với một tài khoản trên hệ thống.');</script>";
echo "<script type='text/javascript'> document.location ='signup.php'; </script>";
} else { 

$sql="insert into tblteacher(Name,Email,MobileNumber,password)values(:fname,:emailid,:phoneno,:password)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->bindParam(':phoneno',$phoneno,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Đăng kí thành công")</script>';
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Đã xảy ra lỗi, xin vui lòng thử lại")</script>';
    }

}



}

?>
    
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>HTQLHSGV || Đăng kí tài khoản</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark" style=" background-image: url('images/cool-background.png');">


    <div class="sufee-login d-flex align-content-center flex-wrap" >
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h3 style="color:black">Hệ thống quản lý hồ sơ Giáo viên  </h3>
                    <hr  color="red"/>
                     <h3 style="color:black"> Đăng kí tài khoản Giáo viên </h3>
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <form action="" method="post" name="login">
                        
                        <div class="form-group">
                            <label>Họ và Tên</label>
                            <input type="text" class="form-control" placeholder="Họ tên đầy đủ" required="true" name="fname">
                        </div>

                           <div class="form-group">
                            <label>Địa chỉ Email</label>
                            <input type="email" class="form-control" placeholder="VD: 'mail@example.com'" required="true" name="emailid">
                        </div> 

                           <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="VD:0123456789" maxlength="10" pattern="[0-9]{10}" title="10 numeric characters only"  required="true" name="mobileno">
                        </div> 
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Khuyến cáo mật khẩu có kí tự in hoa và kí tự đặc biệt" name="password" required="true">
                        </div>
                          
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit">Đăng kí</button>
                                
                                  <div class="checkbox">
                                    <label class="pull-left">
                                <a href="../index.php">Quay về !!</a>
                                    <label class="pull-right">
                                <a href="index.php" style="padding-left: 230px">Đã có tài khoản ? Đăng nhập ở đây</a>
                            </label>

                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
