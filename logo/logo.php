<?php 
require '../database.php';
require '../includes/header.php';

$select_logo = "SELECT * FROM logos";
$select_logo_res = mysqli_query($db_connection, $select_logo);
$after_assoc_logo = mysqli_fetch_assoc($select_logo_res);
?>
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Logo</h3>
            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['logo'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['logo']?></div>
            <?php } unset($_SESSION['logo'])?>
                <form action="logo_update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Change Header Logo</label>
                        <input type="file" name="header_logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="my-2">
                            <img src="../uploads/logo/<?=$after_assoc_logo['header_logo']?>" id="blah" alt="" width="200">
                        </div>
                        <?php if(isset($_SESSION['err'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['err']?></strong>
                        <?php } unset($_SESSION['err'])?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Change Footer Logo</label>
                        <input type="file" name="footer_logo" class="form-control" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                        <div class="my-2">
                            <img src="../uploads/logo/<?=$after_assoc_logo['footer_logo']?>" id="blah2" alt="" width="200">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>