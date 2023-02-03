<?php include "db.php";?>
<?php session_start();?>

<?php
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
  
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

    $query = "select * from users where user_name = '{$username}'; ";
    $select_user_query = mysqli_query($connection,$query);
    if(!$select_user_query){
        die("Query Failed".mysqli_error($connection));
    }
}

    while($row = mysqli_fetch_array($select_user_query)){
        $db_username=$row['user_name'];
        $db_password=$row['user_password'];
        $db_firstname=$row['user_firstname'];
        $db_lastname=$row['user_lastname'];
        $db_user_role=$row['user_role'];

    }
    if($username === $db_username && ($password === md5($db_password) || ($password === $db_password) || (password_verify($password,$db_password)))){
        $_SESSION['username']=$db_username;
        $_SESSION['firstname']=$db_firstname;
        $_SESSION['lastname']=$db_lastname;
        $_SESSION['user_role']=$db_user_role;

        header("Location:../admin");    
    }else{
        header("Location:../index.php");
    }


?>
