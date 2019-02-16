<?php include('../shared/header.php'); ?>
<?php 
$testRep = new TestRepository();
$tests = $testRep->getAll();
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
            $testRep->remove($action);
            $tests = $testRep->getAll();
            break;
        }
    }

    $categoryId = filter_input(INPUT_POST, 'category');

    if($categoryId)
    {
        $tests = $testRep->getAllByCategoryId($categoryId);
    }
}

?>
<script src="search-test.js"></script>
<main>
    <form method="post" id="form-attend-test">
        <aside>
            <span>Categories</span>
            <ul>
                <li><button type="submit">All</button></li>
                <?php foreach($categories as $category) { ?>
                    <li><button type="submit" name="category" value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></button></li>
                <?php } ?>
            </ul>
        </aside>
        <section>
            <br>
            <button type="button" onclick="location.href = '../add-test/add-test.php'">Add Test</button>
            <br>
            <br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody id="search-test-table">
                    <?php foreach($tests as $test) { ?>
                        <tr>
                            <td><?php echo $test['name']; ?></td>
                            <td><?php echo $test['category_name']; ?></td>
                            <td><?php echo '<button type="button" onclick="location.href = \'../add-test/add-test.php?id=' . $test['id'] . '\'">Edit</button>'; ?></td>
                            <td><?php echo '<button class="remove" type="submit" name="action" value="' . $test['id'] . '"><a>Remove</a></button>'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </form>
</main>

<script>
    var question = <?php echo json_encode($tests); ?>;
</script>
<script>
    setTitle('Search tests'); 
</script>

<?php include('../shared/footer.php'); ?>