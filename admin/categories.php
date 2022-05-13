<?php include('header.php') ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">

                <div class="col-xs-6">

                    <?php
                    insert_categories();
                    ?>


                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="cat-title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>

                    <?php
                    // UPDATE AND INCLUDE QUERY
                    if (isset($_GET['edit'])) {
                        $cat_id = $_GET['edit'];
                        include "update_categories.php";
                    }
                    ?>

                </div>

                <div class="col-xs-6">
                    <?php
                    global $select_categories;
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection, $query);
                    ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // FIND ALL CATEGORIES QUERY
                            Find_ALL_categories();
                            ?>

                            <?php
                            // DELETE QUERY
                            delete_query();
                            ?>

                        </tbody>
                    </table>
                </div>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include 'footer.php'; ?>