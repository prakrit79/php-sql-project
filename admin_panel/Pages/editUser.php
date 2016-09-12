<?php

	if(Input::request('post') && Token::check(Input::post('_token'))) {


		$user = new User();
		$user->insertUser();
		
	}
?>






<div class="page-top user">
    <div class="container-fluid"><h3><i class="fa fa-newspaper-o"></i> Users</h3></div>
</div>

<div class="container-fluid">
    <div class="content">
        <h4>Add User</h4>
        <hr/>

        <?= printValidationMessage('alert alert-danger');?>

        <div class="row">

            <form method="post" enctype="multipart/form-data">

            <?= Token::input();?>
               
                <div class="form-group col-md-6">
                    <label>User Name</label>
                    <input value = "<?= Input::post('txtusername')?>" type="text" name="txtusername" class="form-control">
                </div>


                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input value = "<?= Input::post('txtemail')?>" type="text" name="txtemail" class="form-control" >
                </div>


                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="txtpassword" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="txtconpas" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Upload Profile Picture</label>
                    <input type="file" name="upload" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Privilage</label>
                    <select name="txtprev" class="form-control">
                        <option value="">--Select Privilage--</option>

                        <option value="admin">Adminstrator</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <button class="btn btn-success" type="submit">Register A User</button>
                </div>

            </form>
        </div>
    </div>