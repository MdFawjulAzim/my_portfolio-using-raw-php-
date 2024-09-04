<?php require '../database.php' ?>
<?php require '../includes/header.php' ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update Profile Info</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['success'] ?></div>
                <?php }unset($_SESSION['success']) ?>
                <form action="profile_update.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $after_assoc_log['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $after_assoc_log['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <select name="country" class="form-control">
                            <option value="">--Select Your Country</option>
                            <option value="BAN" <?=($after_assoc_log['country'] == 'BAN' ? 'selected' : '') ?>>BAN</option>
                            <option value="USA" <?=($after_assoc_log['country'] == 'USA' ? 'selected' : '') ?>>USA</option>
                            <option value="IND" <?=($after_assoc_log['country'] == 'IND' ? 'selected' : '') ?>>IND</option>
                            <option value="AUS" <?=($after_assoc_log['country'] == 'AUS' ? 'selected' : '') ?>>AUS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="gender" type="radio" value="male" id="flexCheckDefault" <?= ($after_assoc_log['gender'] == 'male' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="gender" type="radio" value="female" id="flexCheckChecked" <?= ($after_assoc_log['gender'] == 'female' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="flexCheckChecked">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update Password</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['pass_update'])) { ?>
                    <div class="alert alert-success"><?= $_SESSION['pass_update'] ?></div>
                <?php }
                unset($_SESSION['pass_update']) ?>
                <form action="password_update.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="<?= $after_assoc_log['id'] ?>">
                        <label for="" class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control">
                        <?php if (isset($_SESSION['crn_pass_err'])) { ?>
                            <strong class="text-danger"><?= $_SESSION['crn_pass_err'] ?></strong>
                        <?php }
                        unset($_SESSION['crn_pass_err']) ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control">
                        <?php if (isset($_SESSION['pass_err'])) { ?>
                            <strong class="text-danger"><?= $_SESSION['pass_err'] ?></strong>
                        <?php }
                        unset($_SESSION['pass_err']) ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control">
                        <?php if (isset($_SESSION['conpass_err'])) { ?>
                            <strong class="text-danger"><?= $_SESSION['conpass_err'] ?></strong>
                        <?php }
                        unset($_SESSION['conpass_err']) ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update Profile Photo</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['photo_update'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['photo_update'] ?></div>
                <?php }unset($_SESSION['photo_update']) ?>
                <form action="photo_update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="<?= $after_assoc_log['id'] ?>">
                        <label for="" class="form-label">Upload Photo</label>
                        <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <?php if (isset($_SESSION['err'])) { ?>
                            <strong class="text-danger"><?=$_SESSION['err'] ?></strong>
                        <?php }unset($_SESSION['err']) ?>
                        <div class="pt-2">
                            <img src="" id="blah" alt="" width="200">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php' ?>