<?php include('../shared/header.php'); ?>
<?php 
$id = filter_input(INPUT_GET, 'id');

$categoriesRep = new CategoryRepository();

if($_POST)
{
    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'category');

    $categoriesRep->save($id, $name);
    header('Location: ../add-category/add-category.php?id=' . $id);
}
else { $category = $categoriesRep->getById($id); }
?>
<button onclick="location.href = '../search-category/search-category.php'">All Categories</button>
<br>
<br>
<form id="main" method="post">
    <input type="hidden" name="id" value="<?php echo $category['id'] ?>" >
    <div class="form-input">
        <label>Name:</label>
        <input type="text" name="category" placeholder="Name" value="<?php echo $category['name'] ?>" />
    </div>

    <button type="submit" name="action" value="save">Save</button>
    <button type="reset">Reset</button>
</form>

<script>
    var category = <?php echo json_encode($category); ?>;
</script>
<script>
    setTitle('<?php echo ($id) ? 'Edit Category' : 'Add Category' ?>'); 
</script>

<?php include('../shared/footer.php'); ?>