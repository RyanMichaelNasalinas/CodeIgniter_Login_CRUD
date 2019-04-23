<?php ?>
<div class="col-md-8 offset-md-2">
         <!--Flashmessage user registered-->
         <?php if($this->session->flashdata('register_success')): ?>
                <?php echo "<div class='alert alert-dismissible alert-success mt-2'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>".$this->session->flashdata('register_success')."</strong></a>
                            </div>"; ?>
                <?php endif; ?>

    <h1><?= $title; ?></h1>
        <?php echo form_open('user_controller/register_user'); ?>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control"  placeholder="Enter First Name" name="first_name">
                <div class="text-danger"><?php echo form_error('first_name'); ?></div>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control"  placeholder="Enter Last Name" name="last_name">
                <div class="text-danger"><?php echo form_error('last_name'); ?></div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control"  placeholder="Enter Email Address" name="email">
                <div class="text-danger"><?php echo form_error('email'); ?></div>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control"  placeholder="Enter Username" name="username">
                <div class="text-danger"><?php echo form_error('username'); ?></div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control"  placeholder="Enter Password" name="password">
                <div class="text-danger"><?php echo form_error('password'); ?></div>
            </div>

           <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control"  placeholder="Confirm Password" name="password2">
                <div class="text-danger"><?php echo form_error('password2'); ?></div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="<?php echo base_url(); ?>user_controller">Already have account, Log In</a>
            </div>
        </div> 

        