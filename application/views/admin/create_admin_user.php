<?php 
    if(!$this->session->userdata('logged_in')) {
        redirect('user_controller');
    }

    if(!$this->session->userdata('is_admin')) {
        redirect('user_controller');
    }
?>

<div class="col-md-8 offset-md-2">
    <h1><?= $title; ?></h1>
        <?php echo form_open('admin_controller/create_user_admin'); ?>
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
                <a href="<?php echo base_url(); ?>admin_controller/user_admin" class="btn btn-danger" onclick="return confirm('Are you sure you want to canccel')">Cancel</a>
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>
        </div> 

        