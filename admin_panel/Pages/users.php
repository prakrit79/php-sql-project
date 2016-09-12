<?php

$userObj = new User();
$users = $userObj->selectUser();

	
?>






<div class="page-top user">
    <div class="container-fluid"><h3><i class="fa fa-newspaper-o"></i> Users</h3></div>
</div>

<div class="container-fluid">
    <div class="content">
        <h4>User Data</h4>
        <hr/>

        
        <?= displayMessage();    ?>
        <div class="row">
            <table class = "table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>User Name</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    <?php $i=1; foreach ($users as $user):  ?>
                    <tr>
                        <td><?= $i++?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td>
                                <a class = "btn btn-primary small" onclick = "return  confirm('are you sure?')" href="delete.php?_uid=<?php echo $user->id; ?>">Delete</a>
                        </td>
                    </tr>
                <?php  endforeach; ?>
                </tbody>
            </table>
            <div class = "pull-right">
                <?= $userObj->pagination;?>
            </div>

            
        </div>
    </div>