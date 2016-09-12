<?php  require_once('init/initialize.php');    ?>


<?php      
	if(Input::request()){
		$userObj = new User();
		$userObj->login();
	}





 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="<?= HTTP.'public_html/bootstrap/css/bootstrap.css'; ?>">
    <link rel ="stylesheet" href= "<?= HTTP.'public_html/custom.css'; ?>">
    <link rel ="stylesheet" href= "<?= HTTP.'public_html/nav.css'; ?>">
    <link rel ="stylesheet" href= "<?= HTTP.'public_html/Assets/font-awesome/css/font-awesome.css'; ?>">
</head>

<style type="text/css">
	.btn-login{
		margin: 300px auto 0 auto;
		display: block;
	}

</style>
<body>

<?=  printValidationMessage('alert alert-danger');   ?>
<?= displayMessage(); ?>

	<!-- Button trigger modal -->
<button type="button" class="btn-login btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Login With Credentials
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login to the dashboard</h4>
            </div>


            <div class="modal-body">

                <form method="post">

                    <div class="form-group">
                        <label >Email</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
                            <input type="text" class="form-control" name="txtemail" id="exampleInputAmount" placeholder="example@gmail.com">
                        </div>
                    </div>

                    <?php echo Token::Input(); ?>

                    <div class="form-group">
                    <label >Password</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="password" class="form-control" name="txtpassword" id="exampleInputAmount">
                    </div>
                    </div>


                    <div class="form-group">
                        <label >Authentication</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-apple"></i></div>
                            <select class="form-control" name="txtprev">
                                <option value="">--Select Authentication--</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>

                            </select>
                        </div>
                    </div>





            </div>



            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Login</button>

                </form>

            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?= HTTP.'public_html/bootstrap/js/jquery.js' ?>"></script>
<script type="text/javascript" src="<?= HTTP.'public_html/bootstrap/js/bootstrap.js' ?>"></script>
</body>
</html>
