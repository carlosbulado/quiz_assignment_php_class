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
            header('Location: ../take-test/take-test.php?id=' . $action);
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
            <span>Tests</span>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th></th>
                </tr>
                <tbody id="search-test-table">
                    <?php foreach($tests as $test) { ?>
                        <tr>
                            <td><?php echo $test['name']; ?></td>
                            <td><?php echo $test['category_name']; ?></td>
                            <td><?php echo '<button type="submit" name="action" value="' . $test['id'] . '"><a>Take Test</a></button>'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </form>
</main>

<script>
    var question = <?php echo json_encode($tests); ?>;
    setTitle('Attend Test'); 
</script>

<?php include('../shared/footer.php'); ?>