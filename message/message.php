<?php 
require '../database.php';
require '../includes/header.php';
$messages = "SELECT * FROM messages";
$messages_res = mysqli_query($db_connection, $messages);
?>
<div class="row">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">All Messages</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['del'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['del']?></div>
                <?php } unset($_SESSION['del'])?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <?php  foreach($messages_res as $index=>$mesg){ ?>
                    <tr class="<?=($mesg['status']==1?'':'bg-dark text-white') ?>">
                        <td><?=$index+1?></td>
                        <td><?=$mesg['name'] ?></td>
                        <td><?=$mesg['email'] ?></td>
                        <td><?=$mesg['subject'] ?></td>
                        <td><?=$mesg['message'] ?></td>
                        <td>
                            <a href="view.php?id=<?= $mesg['id'] ?>" class="btn btn-primary shadow btn-xs sharp del"><i class="fa fa-eye" style="line-height: 18px;"></i></a>
                            <a href="delete.php?id=<?= $mesg['id'] ?>" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash" style="line-height: 18px;"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>