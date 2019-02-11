<?php include('../shared/header.php'); ?>
<?php 
$testId = filter_input(INPUT_GET, 'testId');
$id = filter_input(INPUT_GET, 'id');

$questionRep = new QuestionRepository();

if($_POST)
{
    $id = filter_input(INPUT_POST, 'id');
    $testId = filter_input(INPUT_POST, 'testId');
    $name = filter_input(INPUT_POST, 'question');
    $rightAnswer = filter_input(INPUT_POST, 'rightAnswer');
    $answer_01 = filter_input(INPUT_POST, 'question_answer_01');
    $answer_02 = filter_input(INPUT_POST, 'question_answer_02');
    $answer_03 = filter_input(INPUT_POST, 'question_answer_03');
    $answer_04 = filter_input(INPUT_POST, 'question_answer_04');

    $questionRep->save($id, $name, $testId, $rightAnswer, $answer_01, $answer_02, $answer_03, $answer_04);
    header('Location: ../add-test/add-test.php?id=' . $testId);
}
else { $question = $questionRep->getById($id); }
?>
<form method="post">
    <input type="hidden" name="testId" value="<?php echo $testId ?>" >
    <input type="hidden" name="id" value="<?php echo $question['id'] ?>" >
    <a href="../add-test/add-test.php?id=<?php echo $testId ?>">Back</a>
    <div>
        <div>
            <label>Question:</label>
            <input type="text" name="question" value="<?php echo $question['name'] ?>" />
        </div>
        <div>
            <label>First answer</label>
            <input type="text" name="question_answer_01" value="<?php echo $question['answer_01'] ?>" />
            <input type="radio" name="rightAnswer" value="0" <?php if($question['rightAnswer'] == 0) { echo ' checked'; } ?> /> Is right answer?
        </div>
        <div>
            <label>Second answer</label>
            <input type="text" name="question_answer_02" value="<?php echo $question['answer_02'] ?>" />
            <input type="radio" name="rightAnswer" value="1" <?php if($question['rightAnswer'] == 1) { echo ' checked'; } ?> /> Is right answer?
        </div>
        <div>
            <label>Third answer</label>
            <input type="text" name="question_answer_03" value="<?php echo $question['answer_03'] ?>" />
            <input type="radio" name="rightAnswer" value="2" <?php if($question['rightAnswer'] == 2) { echo ' checked'; } ?> /> Is right answer?
        </div>
        <div>
            <label>Forth answer</label>
            <input type="text" name="question_answer_04" value="<?php echo $question['answer_04'] ?>" />
            <input type="radio" name="rightAnswer" value="3" <?php if($question['rightAnswer'] == 3) { echo ' checked'; } ?> /> Is right answer?
        </div>
    </div>

    <button type="submit" name="action" value="save">Save</button>
    <button type="reset">Reset</button>
</form>

<script>
    var question = <?php echo json_encode($question); ?>;
</script>
<script>
    setTitle('<?php echo ($id) ? 'Edit Question' : 'Add Question' ?>'); 
</script>

<?php include('../shared/footer.php'); ?>