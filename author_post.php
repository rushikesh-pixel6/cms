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
            $the_author=$_GET['author'];
        }
            $query="select * from posts where post_author='{$the_author}';";

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
            }
            ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php  include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
        <?php  include "includes/footer.php"; ?>
 