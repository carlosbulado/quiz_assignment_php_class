<?php
require('../../domain/domain.php');
require('../../repository/repositories.php');

$testRep = new TestRepository();
$tests = $testRep->getAll();

?>
<?php include('../shared/header.php'); ?>
<script src="search-test.js"></script>
<aside>
    <ul id="categories"></ul>
</aside>
<main>
    <a href="../add-test/add-test.php">Add Test</a>
    <table>
        <tr>
            <th>Name</th>
            <th></th>
            <th></th>
        </tr>
        <tbody id="search-test-table">
            <?php foreach($tests as $test) { ?>
                <tr>
                    <td><?php echo $test['name']; ?></td>
                    <td><?php echo '<a href="../add-test/add-test.php?id=' . $test['id'] . '">Edit</a>'; ?></td>
                    <td><?php echo '<button type="submit" name="id" value="' . $test['id'] . '"><a>Remove</a></button>'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<script>
    var question = <?php echo json_encode($tests); ?>;
</script>

<?php include('../shared/footer.php'); ?>