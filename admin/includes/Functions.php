<?php
ob_start();
include "../Includes/DB.php";
?>
<?php
function insert_categories()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo "this field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUES('{$cat_title}') ";
            $creat_category_query = mysqli_query($connection, $query);
            if (!$creat_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}
function Find_ALL_categories()
{
    global $select_categories;
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}
function delete_query()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id ={$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("location: categories.php");
    }
}
function Update_query()
{
    global $connection;
    global $cat_id;
    if (isset($_POST['update_category'])) {
        $the_cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title ='{$the_cat_title}' WHERE cat_id ={$cat_id} ";
        $update_query = mysqli_query($connection, $query);
        if (!$update_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
}
?>