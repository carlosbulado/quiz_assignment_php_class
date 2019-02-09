<?php
require('../../domain/domain.php');
require('../../repository/repositories.php');

$db = new Database();
$db->connect();
$db->prepare('SELECT * FROM tests');
$db->execute();

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
            <?php foreach($db->$result as $test) { ?>
                <tr>
                    <td><?php echo $test['name']; ?></td>
                    <td><?php echo '<a href="../add-test/add-test.php?id=' . $test['id'] . '">Edit</a>'; ?></td>
                    <td><?php echo '<form method="post"><button type="submit" name="id" value="' . $test['id'] . '"><a>Remove</a></button></form>'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php $db->close(); ?>
<?php include('../shared/footer.php'); ?>