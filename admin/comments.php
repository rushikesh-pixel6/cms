<?php include "includes/admin_header.php"?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                           Welcome Admin
                            <small>Author Name</small>
                        </h1>
            <?php 
            if(isset($_GET['source'])){
            $source=$_GET['source'];
            }else{
                $source='';
            }
            switch($source){
                case 'add_post':
                    include "includes/add_post.php"; 
                          break;
                case 'edit_comment':
                    include "includes/ .php"; 
                          break;
               case 'view_comment':
                       include "includes/post_comments.php";
                         break;
               case '74':echo "Nice 78";
                          break;
                default://code here
                include "includes/view_all_comments.php";            
            }
        ?>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"?>