<?php
if(isset($_POST['create_post'])){
    $post_title        = $_POST['title'];
    $post_category_id  = $_POST['post_category'];
    $post_author         = $_POST['post_author'];
    $post_status       = $_POST['post_status'];

    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];

    $post_tags         = $_POST['post_tags'];
    $post_content      = $_POST['post_content'];
    $post_content1      =mysqli_real_escape_string($connection,$post_content);
    $post_date         = date('d-m-y');
    move_uploaded_file($post_image_temp,"../images/$post_image");
    $query="insert into posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)values({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content1}','{$post_tags}','{$post_status}');";
    $create_post_query=mysqli_query($connection,$query);
    if(!$create_post_query){
        echo "Error occures".mysqli_error($connection);
    }
    $the_post_id = mysqli_insert_id($connection);
    echo "<p>Post Added:"."<a href='../post.php?p_id=$the_post_id'>View Post</a></p>";
}
?>
    
    <form class="form-group" action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
         <label for="post_category">Select Post Category Id</label><br>
        <select name="post_category" id="">
            <?php
            $select_query="select * from category;";
            $select_category = mysqli_query($connection,$select_query);
            if(!$select_category){
                echo "erroer occure".mysqli_error($connection);
            }
           while($row=mysqli_fetch_assoc($select_category))
           {   
               $cat_id=$row['cat_id'];      
               $cat_title=$row['cat_title'];
               echo "<option value='$cat_id'>$cat_id.$cat_title</option>";
           }
            ?>
</select>
      </div>

      <div class="form-group">
         <label for="post_author">Post Author</label><br>
        <select name="post_author" id="post_author">
            <option value="">Select Author</option>
            <?php
            $select_query="select * from users;";
            $select_category = mysqli_query($connection,$select_query);
            if(!$select_category){
                echo "erroer occure".mysqli_error($connection);
            }
           while($row=mysqli_fetch_assoc($select_category))
           {   
               $user_id=$row['user_id'];      
               $user_name=$row['user_name'];
               echo "<option value='$user_name'>$user_id.$user_name</option>";
           }
            ?>
</select>
      </div>


      <!-- <div class="form-group">
       <label for="category">Post Author</label>
       <input type="text" class="form-control" name="post_author" id="">
      </div> -->
      
      </div>

      <!-- <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="author">
      </div> -->
      
      <div class="form-group">
      <label for="ststus">Post Status</label><br>
        <select name="post_status" id="ststus">
        <option value="">Select Option</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        </select>
      </div>
      <br>
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="summernote" cols="30" rows="10">
         </textarea>
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>
</form>
>