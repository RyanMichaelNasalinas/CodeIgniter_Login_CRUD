<?php echo form_open('user_controller/login_user');  ?>


    <div class="col-md-4 offset-md-4 mt-5">
    <!--Flashmessage user registered-->
        <?php if($this->session->flashdata('login_failed')): ?>
                <?php echo "<div class='alert alert-dismissible alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>".$this->session->flashdata('login_failed')."</strong></a>
                            </div>"; ?>
                <?php endif; ?>

       

        <h1><?= $title; ?></h1>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter Username" autofocus>
                <div class="text-danger"><?php echo form_error('username');?></div>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter Password" autofocus>
                <div class="text-danger"><?php echo form_error('password');?></div>
            </div>
                <button type="submit" class="btn btn-primary">Log In</button>
                &nbsp;
                <a href="<?php echo base_url(); ?>user_controller/register_user">Register</a>
        </div>
<?php echo form_close(); ?>