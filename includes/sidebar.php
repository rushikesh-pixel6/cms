<div class="col-md-4">
<?php
if(isset($_POST['submit'])){
    $search=$_POST['search'];
    $query="select * from posts where post_tags like '%$search%';";
    $search_query=mysqli_query($connection,$query);
    if(!$search_query){
        die("Query faield".mysqli_error($connection));
    }
   
}
?>



<!-- Blog Search Well -->
<div class="well">
    <form action="search.php" method="post">
    <h4>Blog Search</h4>
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    </div>

    <div class="well">
    <form action="includes/login.php" method="post">
    <h4>Login</h4>
    <div class="input-group">
        <input name="username" style="margin-bottom:10px;"type="text" class="form-control" placeholder="Please Enter Username">
        <input name="password" style="margin-bottom:10px;" type="password" class="form-control" placeholder="Please Enter Password">
        <br>
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="login" value="Login">
      </div>
    </div>
    </form>
    <!-- Search form -->
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
                <?php
                    $query="select * from category;";
                    $select_category_sidebar = mysqli_query($connection,$query);
                ?>


    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php
                 while($row=mysqli_fetch_assoc($select_category_sidebar)){

                    $cat_id=$row['cat_id'];    
                    $cat_title=$row['cat_title'];

                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a>
                    </li>";


                }
               
            ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div> -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php  include "includes/widget.php"; ?>
</div>