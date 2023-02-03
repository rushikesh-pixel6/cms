    <?php include "includes/admin_header.php"?>
    <div id="loading">
  <img src="loader.gif" alt="Loading..." />
</div>
<div id="content" style="display:none;">
<?php
//user count is not working thats a reason i put comment
// $session = session_id();
// $time    = time();
// $time_out_in_seconds = 60;
// $time_out = $time - $time_out_in_seconds;

// $query = "select * from user_online where session ='$session';";
// $send_query = mysqli_query($connection, $query);
// $count = mysqli_num_rows($send_query);

// if($count == NULL){
//     mysqli_query($connection,"insert into users_online(session,time)values('$session','$time');");   
// }else{
//     mysqli_query($connection,"update users_online set time = '$time' where session='$session';");
// }

// $users_online_query=mysqli_query($connection,"select * from users_online where time < '$time_out';");
// $count_user = mysqli_num_rows($users_online_query);

?>
  <!-- Your page content goes here -->
    <div id="wrapper">
    <?php
        $query="select * from posts;";
        $post_count=0;
        $select_posts = mysqli_query($connection,$query);
        $post_count=mysqli_num_rows($select_posts);

    ?>
    <?php
        $query="select * from comments;";
        $comments_count=0;
        $select_posts = mysqli_query($connection,$query);
        $comments_count=mysqli_num_rows($select_posts);
    ?>
    <?php
        $query="select * from users;";
        $user_count=0;
        $select_posts = mysqli_query($connection,$query);
        $user_count=mysqli_num_rows($select_posts);

    ?>
    <?php
        $query="select * from category;";
        $cat_count=0;
        $select_posts = mysqli_query($connection,$query);
        $cat_count=mysqli_num_rows($select_posts);
              
    ?>
    <?php
        $query="select * from posts where post_status='draft';";
        $draft_count=0;
        $select_draft_posts = mysqli_query($connection,$query);
        $draft_count=mysqli_num_rows($select_draft_posts);      
    ?>
    <?php
            $query="select * from comments where comment_status='Unapproved';";
            $unapproved_count=0;
            $select_approved_comment = mysqli_query($connection,$query);
            $unapproved_count=mysqli_num_rows($select_approved_comment);
    ?>
        <?php
        $query="select * from users where user_role='subscriber';";
        $subscriber_user=0;
        $subscriber_user_count = mysqli_query($connection,$query);
        $subscriber_user=mysqli_num_rows($subscriber_user_count);

    ?>


        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome Admin
                            <small><?php echo $_SESSION['firstname']; ?></small>
                            <h1><?php //echo $count_user; ?></h1>
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->
                   
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $post_count;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $comments_count;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $user_count;?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $cat_count; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div id="columnchart_values" style="width: 900px; height: auto;"></div>
                <!-- /.row -->
<div class="row">
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Data", "Count", { role: "style" } ],
        <?php
        echo "['Posts', {$post_count}, '#337ab7'],";
        echo "['Draft Posts', {$draft_count}, '#337ab7'],";
        echo "['Comments', {$comments_count}, '#5cb85c'],";
        echo "['UnApproved Comments', {$unapproved_count}, '#5cb85c'],";
        echo "['Users', {$user_count}, '#f0ad4e'],";
        echo "['Subscriber', {$subscriber_user}, '#f0ad4e'],";
        echo "['Categories', {$cat_count}, '#d9534f'],";

        ?>
        // ["Posts", 1000, "#b87333"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        width: 1000,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
</div>

    



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"?>
</div>
<script>
window.onload = function() {
  document.getElementById("loading").style.display = "none";
  document.getElementById("content").style.display = "block";
};
</script>