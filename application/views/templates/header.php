<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodeIgniter Login CRUD</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>
    <!--Navigation bar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">CI CRUD</a>
    <?php if($this->session->userdata('logged_in')): ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <?php endif; ?>        

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li> -->
            </ul>
               
        <?php if($this->session->userdata('logged_in')): ?>
            <ul class="navbar-nav right">
                <li class="nav-item">
                    <span class="navbar-text text-light">
                        Logged in as <b><?php echo $this->session->userdata('username'); ?></b>
                    </span>
                </li> 
                    &nbsp; 
                    &nbsp;
                <?php if($this->session->userdata('is_admin')): ?> 
                    <li class="nav-item active">
                        <a class="nav-link btn btn-secondary text-dark" href="<?php echo base_url(); ?>admin_controller/create_user_admin">Add User</a>
                    </li>
            <?php endif; ?>
                &nbsp;  
                    <li class="nav-item active">
                        <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>user_controller/logout_user">Logout</a>
                    </li>
                <?php endif; ?>    
            </ul>
        </div>
    </nav>

    <div class="container">
    