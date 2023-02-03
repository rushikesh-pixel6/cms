<?php
    if(isset($_GET['p_id'])){
        $the_user_id = $_GET['p_id'];   
       }
        $query="select * from users where user_id=$the_user_id;";
            $select_user_by_id= mysqli_query($connection,$query);
               while($row=mysqli_fetch_assoc($select_user_by_id))
                   {   
                       $user_id=$row['user_id'];      
                       $user_name=$row['user_name'];
                       $user_password=$row['user_password']; 
                       $user_firstname=$row['user_firstname']; 
                       $user_lastname=$row['user_lastname']; 
                       $user_image=$row['user_image']; 
                       $user_email=$row['user_email']; 
                       $user_role=$row['user_role'];
                   }
       if(isset($_POST['update_user'])){
                       $first_name        = $_POST['first_name'];
                       $last_name         = $_POST['last_name'];
                       $email             = $_POST['email'];
                       $user_role       = $_POST['user_role'];
                   
                       $post_image        = $_FILES['update_image']['name'];
                       $post_image_temp   = $_FILES['update_image']['post_image'];
   
                   
                       $username         = $_POST['username'];
                       $password      = $_POST['password'];

                       move_uploaded_file($post_image_temp,"../images/$post_image");
                       if(empty($post_image)){
                           $query="select * from users where user_id=$the_user_id";
                           $select_image=mysqli_query($connection,$query);
                           while($row=mysqli_fetch_array($select_image)){
                               $post_image=$row['post_image'];
                           }
                       }
                       if(empty($password)){
                        $query="select * from users where user_id=$the_user_id";
                        $select_password=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_array($select_password)){
                            $password=$row['user_password'];
                        }
                       }
                       $query="update users set user_name='{$username}',user_password='{$password}',user_firstname='{$first_name}',user_lastname='{$last_name}',user_email='{$email}',user_image='{$post_image}',user_role='{$user_role}' where user_id=$the_user_id;";
                       $update_user_query=mysqli_query($connection,$query);
                       if(!$update_user_query){
                           die ("Error occures".mysqli_error($connection));
                       }
                   }
?>
    
    <form class="form-group" action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
       <label for="category">Enter First Name</label>
       <input type="text" class="form-control" name="first_name" id="" value="<?php echo $user_firstname; ?>">
      </div>

      <div class="form-group">
       <label for="category">Enter Last Name</label>
       <input type="text" class="form-control" name="last_name" id="" value="<?php echo $user_lastname; ?>">
      </div>

      <div class="form-group">
       <label for="category">Enter Email</label>
       <input type="email" class="form-control" name="email" id="" value="<?php echo $user_email; ?>">
      </div>
      
      <div class="form-group">
       <label for="category">User Role</label><br>
       <select name="user_role" id="">
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
       </select>
      </div>
      
          <div class="form-group">
         <label for="post_image">User Image</label>
         <img width="100px" src="../images/<?php echo $user_image;?>" name="post_image">
          <input type="file"  name="update_image">
      </div>

      <div class="form-group">
         <label for="title">Create UserName</label>
          <input type="text" class="form-control" name="username" value="<?php echo $user_name; ?>">
      </div>

      <div class="form-group">
         <label for="title">Create Password</label>
          <input type="password" class="form-control" name="password">
      </div>
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
      </div>
</form>