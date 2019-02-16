<?php include('../shared/header.php'); ?>
<?php 
$id = filter_input(INPUT_GET, 'id');
$test = new Test();
$testRep = new TestRepository();
$categoriesRep = new CategoryRepository();
$categories = $categoriesRep->getAll();

if (!$_POST)
{
    $test = $testRep->getById($id);
}
else
{
    $action = filter_input(INPUT_POST, 'action');
    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name');
    $category = filter_input(INPUT_POST, 'category');

    $test->$id = $id;
    $test->$name = $name;
    $test->$categoryId = $category;

    if ($action)
    {
        switch ($action)
        {
            case 'save':
            $testRep = new TestRepository();
            $testRep->save($id, $name, $category);
            header('Location: ../search-test/search-test.php');
            break;
            default:
            $quetionRep = new QuestionRepository();
            $quetionRep->remove($action);
            $test = $testRep->getById($id);
            break;
        }
    }
}
?>
<script src="add-test.js"></script>
<main>
    <section class="alone-section">
        <button onclick="location.href = '../search-test/search-test.php'">All Tests</button>
        <br>
        <br>
        <form id="main" method=post>
            <input type="hidden" name="id" value="<?php echo $test['id'] ?>" />
            <div class="form-input">
                <label for="name">Name:</label>
                <input name="name" id="name" type="text" placeholder="Name" value="<?php echo $test['name'] ?>" />
            </div>
        <br>
            <div class="form-input">
                <label for="category">Category:</label> 
                <select id="category" name="category">
                    <option value="0">[Select]</option>
                    <?php foreach($categories as $category) { ?>
                        <option value="<?php echo $category['id'] ?>" <?php echo $category['id'] == $test['categoryId'] ? ' selected="selected"' : '';?>><?php echo $category['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        <br>
            <?php if($id) { ?>
            <button type="button" onclick="location.href = '../add-question-test/add-question-test.php?testId=<?php echo $test['id'] ?>'">New Question</button>
        <br>
        <br>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Answer 01</th>
                        <th>Answer 02</th>
                        <th>Answer 03</th>
                        <th>Answer 04</th>
                        <th>Right Answer</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody id="search-test-table">
                        <?php if($test['questions'] && $test['questions']) { foreach($test['questions'] as $question) { ?>
                            <tr>
                                <td><?php echo $question['name']; ?></td>
                                <td><?php echo $question['answer_01']; ?></td>
                                <td><?php echo $question['answer_02']; ?></td>
                                <td><?php echo $question['answer_03']; ?></td>
                                <td><?php echo $question['answer_04']; ?></td>
                                <td><?php echo $question['rightAnswer'] + 1; ?></td>
                                <td><?php echo '<button type="button" onclick="location.href = \'../add-question-test/add-question-test.php?id=' . $question['id'] . '&testId=' . $id . '\'">Edit</button>'; ?></td>
                                <td><?php echo '<button class="remove" type="submit" name="action" value="' . $question['id'] . '"><a>Remove</a></button>'; ?></td>
                            </tr>
                        <?php } } else { echo '<td rowspan="3">No questions</td>'; } ?>
                    </tbody>
                </table>
            <?php } ?>

            <button type="submit" name="action" value="save">Save</button>
            <button type="reset">Reset</button>
        </form>
    </section>
</main>

<script>
    var question = <?php echo json_encode($test); ?>;
</script>
<script>
    setTitle('<?php echo ($id) ? 'Edit Test' : 'Add Test' ?>'); 
</script>

<?php include('../shared/footer.php'); ?>