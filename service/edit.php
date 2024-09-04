<?php 
require '../database.php';
require '../includes/header.php';

$id = $_GET['id'];
$select = "SELECT * FROM services WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

?>
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Edit Service</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php } unset($_SESSION['success'])?>
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?=$after_assoc['id']?>"> 
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$after_assoc['title']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="desp" class="form-control" rows="5"><?=$after_assoc['desp']?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>