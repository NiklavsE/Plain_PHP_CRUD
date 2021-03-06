<?php
require_once('bootstrap/bootstrap_init.html');
require_once('functions.php');
require_once('header.php');
require_once('footer.php');

$msg = '';
if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (log_in($username, $password) == true) {
        session_start();
        $_SESSION['username'] = $username;
        (is_super_user($username, $hash) == true) ? $_SESSION['priviliges'] = 'SU' : $_SESSION['priviliges'] = 'NU';
        header('LOCATION:/controller.php?controller=product');
    } else {
        $msg = 'invalid user name or password';
    }
}

?>
<link rel="stylesheet" href="styles/login_styles.css">
<div class="container">	
	<div class="row center">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form method="POST">
                      <div class="form-group">
                        <label for="exampleInputUsername">User name</label>
                        <input type="text" class="form-control"  placeholder="Enter username" name='username'/>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                    </div>
                        <div class="text-danger"> <?php echo $msg;?></div>
                        <input type="submit" class="btn btn-primary" name='login' value='LOGIN'/>
                        </form>
		</div>
	</div>
</div>
