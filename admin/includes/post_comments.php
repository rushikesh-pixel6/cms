<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Comment_Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Responce to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>UnApprove</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                    if(isset($_GET['id'])){
                                        $the_post_comment_id=$_GET['id'];
                                    }
                                    $query="select * from comments where comment_post_id=$the_post_comment_id;";
                                    $show_comment = mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_assoc($show_comment))
                                   {   
                                       $comment_id=$row['comment_id']; 
                                       $comment_post_id=$row['comment_post_id'];     
                                       $comment_author=$row['comment_author']; 
                                       $comment_content=$row['comment_content'];
                                       $comment_email=$row['comment_email'];  
                                       $comment_status=$row['comment_status']; 
                                       $comment_date=$row['comment_date'];
                                       echo "<tr>";
                                       echo "<td>{$comment_id}</td>";
                                       echo "<td>{$comment_author}</td>";
                                       echo "<td>{$comment_content}</td>";
                                       echo "<td>{$comment_email}</td>";
                                       echo "<td>{$comment_status}</td>";
                                       $query="select * from posts where post_id=$comment_post_id;";
                                       $select_post_id_query=mysqli_query($connection,$query);
                                       while($row = mysqli_fetch_assoc($select_post_id_query)){
                                        $post_id=$row['post_id'];
                                        $post_title=$row['post_title'];
                                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                       }

                                       
                                       echo "<td>{$comment_date}</td>";
                                       echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                                       echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                                       echo "<td><a href='comments.php?source=edit_comment&p_id={$comment_id}'>Edit</a</td>";
                                       echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                       echo "</tr>";
                                   }
                                ?>                         
                             </tbody>
</table>
<?php
//for a approve comment
if(isset($_GET['approve'])){
    $approve=$_GET['approve'];
    $query="update comments set comment_status='Approved' where comment_id={$approve};";
    $approve_query=mysqli_query($connection,$query);
    if(!$approve_query){
        echo "Error occure on approve query".mysqli_error($connection);
    }
    header("Location:comments.php");
    }
//for a Unapprove comment
if(isset($_GET['unapprove'])){
    $unapprove=$_GET['unapprove'];
    $query="update comments set comment_status='Unapproved' where comment_id={$unapprove};";
    $unapprove_query=mysqli_query($connection,$query);
    if(!$unapprove_query){
        echo "Error occure on Unapprove query".mysqli_error($connection);
    }
    header("Location:comments.php");
    }
//for a delete comment
if(isset($_GET['delete'])){
$the_comment_id=$_GET['delete'];
$query="delete from comments where comment_id={$the_comment_id};";
$delete_query=mysqli_query($connection,$query);
if(!$delete_query){
    echo "Error occure on delete query".mysqli_error($connection);
}
header("Location:comments.php");
}
?>

