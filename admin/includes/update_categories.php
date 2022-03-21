<form action="" method="POST">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <?php
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
        ?>
                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" type="text" class="form-control" name="cat_title">
        <?php
            }
        }
        ?>
        <?php
        ////// UPDATE QUERY
        Update_query();
        ?>
        <input class="form-control" type="text" name="cat_title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>