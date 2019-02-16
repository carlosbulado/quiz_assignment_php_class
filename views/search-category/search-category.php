<?php include('../shared/header.php'); ?>
<?php 
$categoriesRep = new CategoryRepository();
$categories = $categoriesRep->getAll();

if ($_POST)
{
    $action = filter_input(INPUT_POST, 'action');

    if ($action)
    {
        switch ($action)
        {
            default:
            $categoriesRep->remove($action);
            $categories = $categoriesRep->getAll();
            break;
        }
    }
}

?>
<main>
    <section class="alone-section">
        <button onclick="location.href = '../add-category/add-category.php'">Add Category</button>
        <br>
        <br>
        <form method="post">
            <table>
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody id="search-test-table">
                    <?php foreach($categories as $category) { ?>
                        <tr>
                            <td><?php echo $category['name']; ?></td>
                            <td><?php echo '<button type="button" onclick="location.href = \'../add-category/add-category.php?id=' . $category['id'] . '\'">Edit</button>'; ?></td>
                            <td><?php echo '<button class="remove" type="submit" name="action" value="' . $category['id'] . '"><a>Remove</a></button>'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </section>
</main>

<script>
    var categories = <?php echo json_encode($categories); ?>;
</script>
<script>
    setTitle('Search categories'); 
</script>

<?php include('../shared/footer.php'); ?>