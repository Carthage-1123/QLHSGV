 <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                       
                        <div class="form-inline">
                            
                        </div>
                    
                        <div class="form-inline">
                            
                        </div>

                      
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <?php
$eid=$_SESSION['trmsuid'];
$query=$dbh -> prepare("SELECT * from  tblteacher where ID=$eid");
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{  
    if($row->Picture==''):?>

                            <img class="user-avatar rounded-circle" src="images/images.png" alt="User Avatar">
                            <?php else: ?>    
<img src="images/<?php echo $row->Picture;?>" class="user-avatar rounded-circle">
<?php endif;?>
                        </a>
<?php } ?>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="profile.php"><i class="fa fa-user"></i>   Hồ sơ</a>

                            

                            <a class="nav-link" href="change-password.php"><i class="fa fa-cog"></i>Thay mật khẩu</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a>
                        </div>
                    </div>

                    

                </div>
            </div>

        </header>