<?php 
require '../database.php';
require '../includes/header.php';
$id= $_GET['id'];

$select = "SELECT * FROM portfolios WHERE id=$id";
$select_res=mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
?>
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Edit Portfolio</h3>
            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['success']?></div>
            <?php } unset($_SESSION['success'])?>
                <form action="update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                        <label for="" class ="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$after_assoc['title']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="<?=$after_assoc['category']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="my-2">
                            <img src="../uploads/portfolio/<?=$after_assoc['image']?>" id="blah" alt="" width="200">
                        </div>
                        <?php if(isset($_SESSION['err'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['err']?></strong>
                        <?php } unset($_SESSION['err'])?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Portfolio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>