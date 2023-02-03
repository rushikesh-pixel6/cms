<form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Edit Category</label>
                                <?php 
                                if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit']; 
                                $edit_query="select * from category where cat_id={$cat_id};";
                                 $select_category = mysqli_query($connection,$edit_query);
                                while($row=mysqli_fetch_assoc($select_category))
                                {   
                                    $cat_id=$row['cat_id'];      
                                    $cat_title=$row['cat_title'];
                                }
                                ?>
                                <input value="<?php if(isset($cat_title))echo $cat_title;?>" type="text" class="form-control" name="cat_title">
                    <?php   }   ?>
                                <?php 
                                //Update Query
                                if(isset($_POST['update_category'])){
                                $the_cat_title=$_POST['cat_title'];
                                $query_update="update category set cat_title='{$the_cat_title}' where cat_id={$cat_id};";
                                $update_query=mysqli_query($connection,$query_update);
                                if(!$update_query){
                                    die("Query Failed".mysqli_error($connection));
                                }
                                }
                    ?>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                            </div>
</form>