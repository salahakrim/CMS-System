<form action="" method="POST">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <?php
        Edite_query();
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