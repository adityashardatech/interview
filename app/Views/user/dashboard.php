<?= $this->extend('user/user_layout') ?>
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
    </div>
</div>
<?= $this->endSection() ?>