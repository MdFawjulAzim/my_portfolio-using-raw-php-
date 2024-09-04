<?php
require '../database.php';
?>
<?php require '../includes/header.php' ?>
<?php
$select = "SELECT * FROM users";
$select_res = mysqli_query($db_connection, $select);
?>
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-white">Users List</h2>
                <?php if ($after_assoc_log['role'] == 1) { ?>
                    <a class="btn btn-light" data-toggle="modal" data-target="#basicModal">Add New</a>
                <?php } ?>
                <!-- Modal -->
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="registration_form_post.php" method="POST">
                                <div class="modal-header bg-success">

                                <!-- new user add -->
                                    <h5 class="modal-title text-white">Add New User</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Enter Your Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Enter Your Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Enter Your Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <select name="country" class="form-control">
                                            <option value="">--Select Your Country</option>
                                            <option value="BAN">BAN</option>
                                            <option value="USA">USA</option>
                                            <option value="IND">IND</option>
                                            <option value="AUS">AUS</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="male" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="female" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- show user information -->
            <div class="card-body">
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['success'] ?></div>
                <?php }
                unset($_SESSION['success']) ?>
                <?php if (isset($_SESSION['err'])) { ?>
                    <div class="alert alert-danger"><?=$_SESSION['err'] ?></div>
                <?php }
                unset($_SESSION['err']) ?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Gender</th>
                        <th>Photo</th>
                        <?php if ($after_assoc_log['role'] == 1) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                    <?php foreach ($select_res as $sl=>$user) { ?>
                        <tr>
                            <td><?=$sl + 1 ?></td>
                            <td><?=$user['name'] ?></td>
                            <td><?=$user['email'] ?></td>
                            <td><?=$user['country'] ?></td>
                            <td><?=$user['gender'] ?></td>
                            <td>
                                <?php if ($user['photo'] == null) { ?>
                                    <strong>No Preview Found</strong>
                                <?php } else { ?>
                                    <img src="/my_portfolio/uploads/users/<?=$user['photo'] ?>" width="100" alt="">
                                <?php } ?>
                            </td>
                            <?php if ($after_assoc_log['role'] == 1) { ?>
                                <td>
                                    <a data-link="user_delete.php?id=<?=$user['id'] ?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash" style="line-height: 18px;"></i></a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

            <!-- Role Assign -->
    <?php if ($after_assoc_log['role'] == 1) { ?>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Assign Role</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['role'])) { ?>
                        <div class="alert alert-success"><?= $_SESSION['role'] ?></div>
                    <?php }
                    unset($_SESSION['role']) ?>
                    <form action="role_update.php" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Select Role</label>
                            <select name="role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">Moderator</option>
                                <option value="4">Editor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Select User</label>
                            <select name="user_id" class="form-control">
                                <option value="">Select User</option>
                                <?php foreach ($select_res as $user) { ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Assign Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Modal delete -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are You Sure Want to Delete this User?</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">No, Don't</button>
                <button type="button" class="btn btn-danger yes">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php' ?>
<script>
    $('.del').click(function() {
        var link = $(this).attr('data-link');
        $('.yes').click(function() {
            window.location.href = link;
        })
    })
</script>