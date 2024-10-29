<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<?php 
$session = session();
$session_data = $session->get('loggedIn_data');
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h6>Welcome to Dashboard <?= $session_data['first_name'] ?>. Your Last Login Time is <?= date('d-m-Y H:i:s', strtotime($session_data['last_login'])); ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <p class="card-category">Recent Added Users List. Total Users are <?= $userCount ?></p>
                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Last Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; foreach($lastFiveUsers as $list) {?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $list->first_name." ".$list->last_name ?></td>
                                    <td><?= $list->email ?></td>
                                    <td><?= $list->role ?></td>
                                    <td><?= $list->status ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($list->last_login)) ?></td>
                                </tr>
                                <?php $count++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>