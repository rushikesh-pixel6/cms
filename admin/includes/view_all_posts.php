<?php
if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $postValueId){
        // echo  $postValueId;
        $bulk_options =$_POST['bulk_options'];
        switch($bulk_options){
            case 'published': 
                            $query = "update posts set post_status='{$bulk_options}' where post_id={$postValueId};";

                            $update_post_status = mysqli_query($connection,$query);
                            if(!$update_post_status){
                                 echo "erroer occure".mysqli_error($connection);
                            }
                   break;
            case 'draft': 
                            $query = "update posts set post_status='{$bulk_options}' where post_id={$postValueId};";

                            $update_post_status = mysqli_query($connection,$query);
                            if(!$update_post_status){
                                echo "erroer occure".mysqli_error($connection);
                            }
                    break;
            case 'delete': 
                            $query = "delete from posts where post_id={$postValueId};";

                            $delete_posts = mysqli_query($connection,$query);
                            if(!$delete_posts){
                                echo "erroer occure".mysqli_error($connection);
                            }
                    break;
            case 'clone': 
                        $query = "select * from posts where post_id={$postValueId};";
                        $select_posts = mysqli_query($connection,$query);
                        while ($row = mysqli_fetch_array($select_posts)){
                            $post_title        = $row['post_title'];
                            $post_category_id  = $row['post_category_id'];
                            $post_author        =$row['post_author'];
                            $post_status       = $row['post_status'];
                            $post_image        = $row['post_image'];
                            $post_tags         = $row['post_tags'];
                            $post_content      = $row['post_content'];
                            $post_content1     =mysqli_real_escape_string($connection,$post_content);
                            $post_date         = date('d-m-y');
                            $query="insert into posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)values({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content1}','{$post_tags}','{$post_status}');";
                            $create_post_query=mysqli_query($connection,$query);
                            if(!$create_post_query){
                                echo "Error occures".mysqli_error($connection);
                            }
                        }
                        if(!$select_posts){
                            echo "erroer occure".mysqli_error($connection);
                        }
                    break;         
                }
    }

   }
?>
<form action="" method="post">
    <table class="table table-bordered table-hover">
            <div class="bulkOptionsContainer" class="col-xs-4">
                <select name="bulk_options" id="" class="form-control">
                    <option value="">Select Option</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="delete">Delete</option>
                    <option value="clone">Clone</option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a class="btn btn-primary" href="./posts.php?source=add_post">Add New</a>
            </div>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAllBoxes"></th>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Tags</th>
                                        <th>Comments</th>
                                        <th>Date</th>
                                        <th>Content</th>
                                        <th>View Count</th>
                                        <th colspan="2">Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                        $query="select * from posts;";
                                        $select_posts = mysqli_query($connection,$query);
                                        $post_count = 0;
                                    while($row=mysqli_fetch_assoc($select_posts))
                                    {  
                                        $post_count++; 
                                        $post_id=$row['post_id'];      
                                        $post_category_id=$row['post_category_id'];
                                        $post_title=$row['post_title']; 
                                        $post_author=$row['post_author']; 
                                        $post_date=$row['post_date']; 
                                        $post_image=$row['post_image']; 
                                        $post_content=$row['post_content']; 
                                        $post_tags=$row['post_tags'];
                                        $post_comments_count=$row['post_comments_count'];
                                        $view_count  =$row['view_count'];
                                        $post_status=$row['post_status'];
                                        echo "<tr>";
                                        ?>
                                        <td><input id='<?php echo $post_id; ?>' type='checkbox' class='checkBoxes' name='checkBoxArray[]' value="<?php echo $post_id;?>"></td>
                                        <?php
                                        echo "<td>{$post_count}</td>";
                                        echo "<td>{$post_author}</td>";
                                        echo "<td>{$post_title}</td>";
                                        //for a categoery
                                        $select_query="select * from category where cat_id=$post_category_id";
                                        $select_category = mysqli_query($connection,$select_query);
                                        if(!$select_category){
                                            echo "erroer occure".mysqli_error($connection);
                                        }
                                        while($row=mysqli_fetch_assoc($select_category))
                                        {   
                                            $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                            echo "<td>{$cat_title}</td>";
                                        }
                                        //cend

                                        echo "<td>{$post_status}</td>";
                                        echo "<td><img width='100px' height='50px' src='../images/{$post_image}'/></td>";
                                        echo "<td>{$post_tags}</td>";
                                        $query="select * from comments where comment_post_id=$post_id;";
                                        $select_post_id_query=mysqli_query($connection,$query);
                                        $count=0;
                                        while($row = mysqli_fetch_assoc($select_post_id_query)){
                                            $count++;
                                        }
                                        //update comment count in database
                                        $update_comment_count="update posts set post_comments_count=$count where post_id=$post_id;";
                                        $update_c_count=mysqli_query($connection,$update_comment_count);
                                        if(!$update_c_count){
                                            die("error ocured".mysqli_error($connection));
                                        }
                                        echo "<td><a href='comments.php?source=view_comment&id=$post_id'>{$count}</a></td>";
                                        echo "<td>{$post_date}</td>";
                                        echo "<td>{$post_content}</td>";
                                        echo "<td><a href='posts.php?reset_count={$post_id}'>$view_count</a></td>";
                                        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a</td>";
                                        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>                         
                                </tbody>
    </table>
</form>
<?php
if(isset($_GET['delete'])){
$the_post_id=$_GET['delete'];
$query="delete from posts where post_id={$the_post_id}";
$delete_query=mysqli_query($connection,$query);
if(!$delete_query){
    echo "Error occure on delete query".mysqli_error($connection);
}
}
if(isset($_GET['reset_count'])){
    $the_post_id=$_GET['reset_count'];
    $query="update posts set view_count=0 where post_id={$the_post_id}";
    $view_reset_query=mysqli_query($connection,$query);
    if(!$view_reset_query){
        echo "Error occure on view_reset_query".mysqli_error($connection);
    }
    header("Location:posts.php");
    }
?>
<script>
document.getElementById("selectAllBoxes").addEventListener("change", function() {
    // code to be executed on checkbox change event
    <?php
     $query="select * from posts;";
    $select_posts = mysqli_query($connection,$query);
     while($row=mysqli_fetch_assoc($select_posts))
                                     {
                                        $post_id=$row['post_id']; 
    ?>
    document.getElementById("<?php echo $post_id; ?>").checked = true;

<?php } ?>
});
</script>

