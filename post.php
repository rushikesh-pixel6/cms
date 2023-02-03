<?php include "includes/db.php"; ?>
    <?php include "includes/header.php";?>
    <!-- Navigation -->
    <?php  include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
        if(isset($_GET['p_id'])){
            $the_post_id=$_GET['p_id'];
            $view_update_query = "update posts set view_count = view_count + 1 where post_id=$the_post_id;";
            $view_count_update = mysqli_query($connection,$view_update_query);
            if(!$view_count_update){
                die("VCount Qiuery Failed".mysqli_error($connection));
            }
            $query="select * from posts where post_id=$the_post_id;";

            $select_all_post_query = mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc( $select_all_post_query)){
                
                $post_title=$row['post_title'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image=$row['post_image'];
                $post_content=$row['post_content'];

          ?>
        <!-- First Blog Post -->
        <h2>
            <a href="#"><?php echo $post_title; ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo $post_author; ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
        <hr>
        <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
        <hr>
        <p><?php echo $post_content; ?></p>
        <hr>
            <?php }?>
               
                            <!-- Blog Comments -->
            <?php
            if(isset($_POST['create_comment'])){
                $the_post_id=$_GET['p_id'];
                $comment_author=$_POST['comment_author'];
                $comment_email=$_POST['comment_email'];
                $comment_content=$_POST['comment_content'];
            
            $query="insert into comments(comment_id,comment_post_id, comment_author,comment_email,comment_content,comment_status,comment_date)values(NULL,{$the_post_id}, '{$comment_author}','{$comment_email}','{$comment_content}','Unapproved',now());";
            $create_comment_query=mysqli_query($connection,$query);
                if(!$create_comment_query){
                    die('Query Failed'.mysqli_error($connection));
                }
                function redirect($location){
                    header("Location:post.php?p_id=$location");
                }
                redirect($the_post_id);
            }
            ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form  role="form" action="" method="post">
                    <div class="form-group">
                        <label for="author">Author</label>
                            <input class="form-control" name="comment_author" id="author"></input>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                            <input class="form-control" name="comment_email" id="Email"></input>
                    </div>

                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Post Comment</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php 
                                    $the_post_id=$_GET['p_id'];
                                    $query="select * from comments where comment_post_id=$the_post_id and comment_status='Approved' order by comment_id DESC;";
                                    $show_comment = mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_array($show_comment))
                                   {       
                                       $comment_author=$row['comment_author']; 
                                       $comment_content=$row['comment_content']; 
                                       $comment_date=$row['comment_date'];
                                       ?>

                 <!-- Comment -->
                               <div class="media">
                                    <a class="pull-left" href="#">
                                     <img class="media-object" src="http://placehold.it/64x64" alt="">
                                 </a>
                                 <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;?></small>
                        </h4>
                        <?php echo $comment_content;?>
                    </div>
                </div>




                                   <?php }
                                   }else{
                                    header("Location: index.php");
                                   }
                                       ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php  include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
        <?php  include "includes/footer.php"; ?>
 
