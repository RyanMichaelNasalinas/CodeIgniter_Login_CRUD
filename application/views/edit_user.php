<?php if(!$this->session->userdata('id') && !$this->session->userdata('id')) {
    redirect('user_controller/login_user');
}
?>    
    <div class="col-md-8 offset-md-2">
        <h1 class="mt-2 "><?= $title; ?></h1>
          <form action="<?php echo site_url('user_controller/update_user/'); ?><?php echo $user['id']; ?>" method="post">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control"  placeholder="Enter First Name" name="first_name" value="<?php echo $user['first_name']; ?>">
                    <div class="text-danger"><?php echo form_error('first_name'); ?></div>
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control"  placeholder="Enter Last Name" name="last_name" value="<?php echo $user['last_name']; ?>">
                    <div class="text-danger"><?php echo form_error('last_name'); ?></div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control"  placeholder="Enter Email Address" name="email" value="<?php echo $user['email']; ?>">
                    <div class="text-danger"><?php echo form_error('email'); ?></div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control"  placeholder="Enter Username" name="username" value="<?php echo $user['username']; ?>">
                    <div class="text-danger"><?php echo form_error('username'); ?></div>
                </div>
                    
                <div>
                    <a href="<?php echo base_url(); ?>user_controller" class="btn btn-danger" onclick="return confirm('All data will discarded')">Cancel</a>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to update this data')">Update</button>
                </div>
        </form>
        </div>  
