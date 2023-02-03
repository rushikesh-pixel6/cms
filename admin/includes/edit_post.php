<?php
    if(isset($_GET['p_id'])){
     $the_post_id = $_GET['p_id'];   
    }
     $query="select * from posts where post_id=$the_post_id;";
         $select_posts_by_id= mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_posts_by_id))
                {   
                    $post_id=$row['post_id'];      
                    $post_category_id=$row['post_category_id'];
                    $post_title=$row['post_title']; 
                    $post_author=$row['post_author']; 
                    $post_date=$row['post_date']; 
                    $post_image=$row['post_image']; 
                    $post_content=$row['post_content']; 
                    $post_tags=$row['post_tags'];
                    $post_comments_count=$row['post_comments_count'];
                    $post_status=$row['post_status'];
                }
    if(isset($_POST['update_post'])){
                    $post_image = [];
                    $post_image_temp =[];
                    $post_title        = $_POST['title'];
                    $post_category_id  = $_POST['post_category_id'];
                    $post_author       = $_POST['post_author'];
                    $post_status       = $_POST['post_status'];
                
                    $post_image        = $_FILES['update_image']['name'];
                    $post_image_temp   = $_FILES['update_image']['post_image'];

                    $post_tags         = $_POST['post_tags'];
                    $post_content      = $_POST['post_content'];
                    $post_content1      =mysqli_real_escape_string($connection,$post_content);
                    move_uploaded_file($post_image_temp,"../images/$post_image");
                    if(empty($post_image)){
                        $query="select * from posts where post_id=$the_post_id";
                        $select_image=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_array($select_image)){
                            $post_image=$row['post_image'];
                        }
                    }
                    $query="update posts set post_category_id='{$post_category_id}',post_title='{$post_title}',post_author='{$post_author}',post_date= now(),post_image='{$post_image}',post_content='{$post_content1}',post_tags='{$post_tags}' where post_id=$the_post_id;";
                    $update_post_query=mysqli_query($connection,$query);
                    if(!$update_post_query){
                        die ("Error occures".mysqli_error($connection));
                    }
                    $the_post_id = $_GET['p_id'];  
                    echo "<p>Update Post Succesfully:"."<a href='../post.php?p_id=$the_post_id'>View Post</a></p>";
                }
?>
    <form class="form-group" action="" method="post" enctype="multipart/form-data">    
     
    <h6></h6>
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title">
      </div>

         <div class="form-group">
         <label for="post_category_id">Select Post Category Id</label>
        <select name="post_category_id" id="">
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
       <label for="post_author">Post Author</label>
       <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="post_author" id="">
      </div>
      
      </div>
      <div class="form-group">
         <label for="post_status">Post Status</label>
        <select name="post_status" id="">
            <?php
            echo "<option value='$post_status'>$post_status</option>";
            echo "<option value='published'>Published</option>";
            echo "<option value='draft'>Draft</option>";
            ?>
            </select>
                  </div> 
      </div>
    <div class="form-group">
         <label for="post_image">Post Image</label>
         <img width="100px" src="../images/<?php echo $post_image;?>" name="post_image">
         <input type="file" src="../images/<?php echo $post_image;?>" name="update_image">
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" value="<?php echo $post_tags; ?>"class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control " name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
         </textarea>
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
      </div>
</form>