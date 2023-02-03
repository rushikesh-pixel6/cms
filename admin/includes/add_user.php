<?php
if(isset($_POST['create_user'])){
    $username          = $_POST['username'];
    $password          = $_POST['password'];
    $first_name        = $_POST['first_name'];
    $last_name         = $_POST['last_name'];
    $email             = $_POST['email'];

    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];
    $user_role         = $_POST['user_role'];
    // $post_content      = $_POST['post_content'];
    // $post_content1      =mysqli_real_escape_string($connection,$post_content);
    // $post_date         = date('d-m-y');
    move_uploaded_file($post_image_temp,"../images/$post_image");
    $password = password_hash($password, PASSWORD_DEFAULT);
     $query="insert into users (`user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES ('$username', '$password', '$first_name', '$last_name', '$email', '$post_image', '$user_role');";
    $create_user_query=mysqli_query($connection,$query);
     if(!$create_user_query){
       echo "Error occures".mysqli_error($connection);
      }
      echo "User Created: "."<a href='users.php'>View Users</a>";
}
?>
    
    <form class="form-group" action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
       <label for="category">Enter First Name</label>
       <input type="text" class="form-control" name="first_name" id="">
      </div>

      <div class="form-group">
       <label for="category">Enter Last Name</label>
       <input type="text" class="form-control" name="last_name" id="">
      </div>

      <div class="form-group">
       <label for="category">Enter Email</label>
       <input type="email" class="form-control" name="email" id="">
      </div>

      <div class="form-group">
       <label for="category">User Role</label><br>
       <select name="user_role" id="">
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
       </select>
      </div>

      <div class="form-group">
         <label for="title">Create UserName</label>
          <input type="text" class="form-control" name="username">
      </div>

      <div class="form-group">
         <label for="title">Create Password</label>
          <input type="password" class="form-control" name="password">
      </div>

    <div class="form-group">
         <label for="post_image">User Image</label>
          <input type="file"  name="image">
      </div>

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
      </div>
</form>