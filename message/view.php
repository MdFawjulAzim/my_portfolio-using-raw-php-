<?php 
require '../database.php';
require '../includes/header.php';

$id = $_GET['id'];

$update = "UPDATE messages SET status=1 WHERE id=$id";
mysqli_query($db_connection, $update);

$messages = "SELECT * FROM messages WHERE id=$id";
$messages_res = mysqli_query($db_connection, $messages);
$after_assoc = mysqli_fetch_assoc($messages_res);
?>

<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Message Details</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>Name</td>
                        <td><?=$after_assoc['name']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?=$after_assoc['email']?></td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td><?=$after_assoc['subject']?></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td><?=$after_assoc['message']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>