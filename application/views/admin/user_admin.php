<?php 

if(!$this->session->userdata('logged_in')) {
    redirect('user_controller');
}

if(!$this->session->userdata('is_admin')) {
  redirect('user_controller');
}
?>

<div class="row mt-5">

    <div class="col-md-12  table-responsive">
    <h1>Administrator</h1>
        <table class="table table-hover">
        <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">User Type</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users as $user):?>
      <tr>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['first_name']." ".$user['last_name']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td><?php echo $user['username']; ?></td>
          <td><input style="border:none" type="password" value="<?php echo $user['password']; ?>" disabled></td>
          <td><?php echo $user['user_type']; ?></td>
          <td><a href="<?php echo base_url(); ?>admin_controller/edit_admin_user/<?php echo $user['id']; ?>" class="btn btn-secondary">Edit</a> | 
          <a href="<?php echo base_url(); ?>admin_controller/delete_user/<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this data')" class="btn btn-danger">Delete</a></td>
      </tr>
    <?php endforeach;?>
  </tbody>
        </table>
    </div> 
</div>

