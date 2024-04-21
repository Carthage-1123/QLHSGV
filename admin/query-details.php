<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{





  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>HTQLGHSGV || Chi tiết truy vấn</title>
    
    <link rel="apple-touch-icon" href="apple-icon.png">
  


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Chi tiết truy vấn</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Bảng điều khiển</a></li>
                            <li><a href="manage-teacher.php"> Truy vấn</a></li>
                            <li class="active"> Chi tiết truy vấn</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"> Chi tiết truy vấn</strong>
                            </div>
                            <div class="card-body">
                                <table id="dtBasicExample" class="table table-striped table-bordered">
                                    <thead>
                                        </thead>
<?php
$qid=intval($_GET['qid']);
$sql="SELECT * from tblquery where  id='$qid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
              
                <tr>
               <th> Họ Tên đầy đủ</th>
            <td><?php  echo htmlentities($row->fName);?></td>
            <th>Địa chỉ Email</th>
                  <td><?php  echo htmlentities($row->emailId);?></td>
              </tr>
              <tr>
                <th>Số điện thoại</th>
                   <td><?php  echo htmlentities($row->mobileNumber);?></td>
                   <th>Query Date</th>
                  <td><?php  echo htmlentities($row->queryDate);?></td>
              </tr>
<tr>
    <th>Truy vấn</th>
     <td colspan="3"><?php  echo htmlentities($row->Query);?></td>
</tr>
<tr>
    <th>Ghi chú</th>
     <td colspan="3"><?php  echo htmlentities($row->teacherNote);?></td>
</tr>



                  </td>
                </tr>
               <?php $cnt=$cnt+1;}} ?>   

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>
<?php }  ?>