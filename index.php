<?php
 session_start();
if (($_SESSION['nama']!='')) {
    header('location:admin/index.php');
}
$err = $_GET['err'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PERPUS | UNAS PASIM</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <!-- Le styles -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>        
        <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>          
        <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script> 
        <script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script> 
    <body class='login'>  
        <div class="col-md-4">                      
        </div> 
        <div class="col-md-4"> 
            <div class="logo"   >
                <img style="text-align: center" src="assets/img/logologin.png" alt="logo" class="img-responsive" />  
            </div>
            <div class="content">
                <h4 align="center"><?php
                    if ($err == "1") {
                        echo'Username atau Password Salah';
                    } else {
                        echo 'Login Disini';
                    }
                    ?></h4>
                <form method="post" action="admin/index.php">
                    <div class="form-group"> 
                        <label class="control-label visible-ie8 visible-ie9">Username</label>
                        <div class="input-icon">
                            <i class="icon-user"></i>
                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" style="width: 100%;height: 35px;" name="username"  id="username" autofocus/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <div class="input-icon">
                            <i class="icon-lock"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"  id="password" style="width: 100%;height: 35px;" />
                        </div>
                    </div>
                    <!--                    <div class="form-group">
                                            <div class="input-icon">
                                                <select name="id_status" class="form-control">
                                                    <option value="-" selected disabled>-- Status --</option>
                    <?php
                    include './config/database.php';
                    $data = mysql_query("SELECT * FROM mst_status WHERE id_status < 3");
                    while ($result = mysql_fetch_array($data)) {
                        ?>
                                                        <option value="<?php echo $result['id_status']; ?>"><?php echo $result['status']; ?></option>   
<?php } ?>
                                                </select>
                                            </div>
                                        </div>-->
                    <div class="form-actions">                     
                        <button type="submit" class="btn red pull-right">
                            Login <i class="m-icon-swapright m-icon-white"></i>
                        </button>               
                    </div>
                </form>
            </div>  
            <div class="copyright">
                Copyright &copy; 2015  - Perpustakaan | UNAS PASIM  <br>
                Pengembangan Sistem Informasi Manajemen.
            </div>
        </div>
        <div class="col-md-4">                      
        </div> 
    </body>
</html>