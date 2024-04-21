<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{

//Code for Deletion
if($_GET['delid'])
{
$tid=$_GET['delid'];
$query=$dbh->prepare("delete from tblteacher where ID=:tid");
$query->bindParam(':tid',$tid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Teacher deleted")</script>';
echo "<script>window.location.href ='manage-teacher.php'</script>";
  }


  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>HTQLGHSGV || Quản lý hồ sơ Công khai</title>
    
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
                        <h1>Quản lý hồ sơ Công khai</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Bảng điều khiển</a></li>
                            <li><a href="manage-teacher.php">Quản lý hồ sơ Giáo viên</a></li>
                            <li class="active">Quản lý hồ sơ Công khai</li>
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
                                <strong class="card-title">Quản lý hồ sơ Công khai</strong>
                            </div>
                            <div class="card-body">
                                <table id="dtBasicExample" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>STT</th>
            
                  <th>Tên giáo viên</th>
                  <th>Môn học</th>
                  <th>Trạng thái hồ sơ</th>
                    <th>Ngày đăng kí</th>       
                   <th>Thao tác</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$sql="SELECT * from tblteacher where isPublic='1'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
              
                <tr>
                  <td><?php echo htmlentities($cnt);?></td>
            <td><?php  echo htmlentities($row->Name);?></td>
                  <td><?php  echo htmlentities($row->TeacherSub);?></td>
                    <td><?php $status=$row->isPublic;
if($status=='1'):
echo "Công khai";
else:
echo "Riêng tư";
endif;    
                ?></td>
                  <td><?php  echo htmlentities($row->RegDate);?></td>
                  <td><a href="edit-teacher-detail.php?tid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary">Sửa</a>
<a href="manage-teacher.php?delid=<?php echo htmlentities ($row->ID);?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa ?');">Xóa</a>
<a href="queries.php?tid=<?php echo htmlentities ($row->ID);?>&&tname=<?php  echo htmlentities($row->Name);?> (<?php  echo htmlentities($row->TeacherSub);?>)" class="btn btn-primary">Truy vấn</a>
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
    <script  src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
<script type="text/javascript">
    $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
</body>

</html>
<?php }  ?>