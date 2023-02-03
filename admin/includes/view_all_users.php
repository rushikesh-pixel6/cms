<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Profile Pic</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th colspan="2">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                    $query="select * from users;";
                                    $show_user = mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_assoc($show_user))
                                   {   
                                       $user_id=$row['user_id']; 
                                       $user_name=$row['user_name'];     
                                       $user_firstname=$row['user_firstname']; 
                                       $user_lastname=$row['user_lastname'];
                                       $user_image=$row['user_image'];
                                       $user_email=$row['user_email'];  
                                       $user_role=$row['user_role']; 
                                        echo "<tr>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$user_name</td>";
                                        echo "<td><img width='100px' height='50px' src='../images/{$user_image}'/></td>";
                                        echo "<td>$user_firstname</td>";
                                        echo "<td>$user_lastname</td>";
                                        echo "<td>$user_email</td>";
                                        echo "<td>$user_role</td>";
                                        echo "<td>Date</td>";
                                        echo "<td><a href='users.php?admin={$user_id}'>Make a Admin</a></td>";
                                        echo "<td><a href='users.php?subscriber={$user_id}'>Make a subcriber</a></td>";
                                        echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a</td>";
                                        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
              
                                       echo "</tr>";
                                   }
                                ?>                         
                             </tbody>
</table>
<?php
//for a admin
if(isset($_GET['admin'])){
    $the_user_id=$_GET['admin'];
    $query="update users set user_role='admin' where user_id={$the_user_id};";
    $admin_query=mysqli_query($connection,$query);
    if(!$admin_query){
        echo "Error occure on admin query".mysqli_error($connection);
    }
    header("Location:users.php");
    }
//for a Subscriber
if(isset($_GET['subscriber'])){
    $the_user_id=$_GET['subscriber'];
    $query="update users set user_role='subscriber' where user_id={$the_user_id};";
    $admin_query=mysqli_query($connection,$query);
    if(!$admin_query){
        echo "Error occure on admin query".mysqli_error($connection);
    }
    header("Location:users.php");
    }
//for a delete comment
if(isset($_GET['delete'])){
$the_user_id=$_GET['delete'];
$query="delete from users where user_id={$the_user_id};";
$delete_query=mysqli_query($connection,$query);
if(!$delete_query){
    echo "Error occure on delete query".mysqli_error($connection);
}
header("Location:users.php");
}
?>

