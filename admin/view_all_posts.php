<?php include 'header.php' ?>
<div id="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "cms");
                    global $connection;
                    global $select_posts;
                    $query = "SELECT * FROM posts";
                    $select_posts = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_posts)) {
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_date = $row['post_date'];
                        echo $post_date;

                        echo "<tr>";
                        echo "<td>{$post_id}</td>";
                        echo "<td>{$post_author}</td>";
                        echo "<td>{$post_title}</td>";
                        echo "<td>{$post_category_id}</td>";
                        echo "<td>{$post_status}</td>";
                        echo "<td><img width='150' src='../images/{$post_image}' alt='image'></td>";
                        echo "<td>{$post_tags}</td>";
                        echo "<td>{$post_comment_count}</td>";
                        echo "<td>{$post_date}</td>";
                        echo "<td><a href='view_all_posts.php?delete={$post_id}'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    <!-- <td>10</td>
        <td>salah</td>
        <td>bootstrap framework</td>
        <td>bootstrap</td>
        <td>status</td>
        <td>images</td>
        <td>tags</td>
        <td>comment</td>
        <td>dates</td> -->

                </tbody>
            </table>
            <?php
            if (isset($_GET['delete'])) {
                $the_id_post = $_GET['delete'];
                $query = "DELETE FROM posts WHERE post_id = {$the_id_post}";
                $detele_query = mysqli_query($connection, $query);
            }
            ?>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include 'footer.php' ?>