<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<?php 
$session = session();
$session_data = $session->get('loggedIn_data');
?>
<style>
    .modal-backdrop{display: none !important}
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Users List</div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUsersModal"><i class="la la-plus"></i> Create New User</button>
                    </div>
                    <div class="card-body">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($users_list as $user) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $user['first_name']." ".$user['last_name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['role'] ?></td>
                                    <td><?= $user['status'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#addUsersModal" onclick="getSingleData(<?= $user['id'] ?>)"><i class="la la-edit"></i></button>
                                        <button type="button" class="btn btn-link btn-simple-danger" onclick="deleteUser(<?= $user['id'] ?>)"><i class="la la-times"></i></button>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Users Section -->
<form metod = "post" id="createUser">
    <div class="modal fade" id="addUsersModal" tabindex="-1" role="dialog" aria-labelledby="addUsersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addUsersModalLabel">Create New User</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="squareInput">First Name</label>
                                <input type="text" class="form-control input-square" placeholder="First Name" required name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="squareInput">Last Name</label>
                                <input type="text" class="form-control input-square" placeholder="Last Name" required name="last_name">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="squareInput">Email</label>
                                <input type="email" class="form-control input-square" placeholder="Email" required autocomplete="off" name="email">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="squareInput">Password</label>
                                <input type="password" class="form-control input-square" placeholder="Password" required autocomplete="off" name="password">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-check">
                                <label>Role</label><br/>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="role" value="Admin">
                                    <span class="form-radio-sign">Admin</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="role" value="Customer">
                                    <span class="form-radio-sign">Customer</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-check">
                                <label>Status</label><br/>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="status" value="Active">
                                    <span class="form-radio-sign">Active</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="status" value="Inactive">
                                    <span class="form-radio-sign">Inactive</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $('#createUser').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('api/create-user') ?>",
            type: 'POST',
            data: {
                id: $('input[name="id"]').val(),
                first_name: $('input[name="first_name"]').val(),
                last_name: $('input[name="last_name"]').val(),
                email: $('input[name="email"]').val(),
                password: $('input[name="password"]').val(),
                role: $('input[name="role"]:checked').val(),
                status: $('input[name="status"]:checked').val(),
            },
            success: function(response) {
                if(response.status == 200) {
                    $('#addUsersModal').modal('hide');
                    $('#createUser')[0].reset();
                    $.notify({
                        icon: 'la la-bell',
                        title: 'Success!',
                        message: response.message,
                    }, {
                        type: 'success',
                        placement: {
                            from: "bottom",
                            align: "center"
                        },
                        time: 1000,
                    });
                    window.location.reload();
                } else {
                    $('#addUsersModal').modal('hide');
                    $('#createUser')[0].reset();
                    $.notify({
                        icon: 'la la-bell',
                        title: 'Error!',
                        message: response.message,
                    }, {
                        type: 'error',
                        placement: {
                            from: "bottom",
                            align: "center"
                        },
                        time: 1000,
                    });
                }
            },
        });
    });

    function getSingleData(id) {
        if(id) {
            $.ajax({
                url: "<?= base_url('api/get-record') ?>",
                type: 'POST',
                data: {id:id},
                success: function(response) {
                    if(response && response.id) {
                        $('input[name="id"]').val(response.id);
                        $('input[name="first_name"]').val(response.first_name);
                        $('input[name="last_name"]').val(response.last_name);
                        $('input[name="email"]').val(response.email);
                        $('input[name="role"][value="' + response.role + '"]').prop('checked', true);
                        $('input[name="status"][value="' + response.status + '"]').prop('checked', true);
                    } else {
                        clearForm();
                    }
                },
                error: function() {
                    clearForm();
                }
            });
        }
    }
    function deleteUser(id) {
        if (confirm("Are you sure you want to delete this user?")) {
            $.ajax({
                url: "<?= base_url('api/delete-user') ?>", 
                type: 'DELETE',
                data: { id: id },
                success: function(response) {
                    if (response.status === 200) {
                        alert('User deleted successfully');
                        location.reload(); 
                    } else {
                        alert('Failed to delete user');
                    }
                },
                error: function() {
                    alert('Error occurred while deleting user');
                }
            });
        }
    }
</script>
<?= $this->endSection() ?>