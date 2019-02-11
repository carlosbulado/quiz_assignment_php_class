<?php include('../shared/header.php'); ?>
<?php
$testRep = new TestRepository();
$tests = $testRep->getAll();

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
}

?>
<aside>
    <ul id="categories"></ul>
</aside>
<main>
    <form method="post">
        <table>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
            <tbody id="search-test-table">
                <?php foreach($tests as $test) { ?>
                    <tr>
                        <td><?php echo $test['name']; ?></td>
                        <td><?php echo '<button type="submit" name="action" value="' . $test['id'] . '"><a>Take Test</a></button>'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>
</main>

<script>
    var question = <?php echo json_encode($tests); ?>;
    setTitle('Attend Test'); 
</script>

<?php include('../shared/footer.php'); ?>