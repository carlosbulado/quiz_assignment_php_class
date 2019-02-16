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
<form id="main" method="post">
    <input type="hidden" name="testId" value="<?php echo $testId ?>" >
    <input type="hidden" name="id" value="<?php echo $question['id'] ?>" >
    <button onclick="location.href = '../add-test/add-test.php?id=<?php echo $testId ?>'">Back to the test</button>
    <br>
    <br>
    <div>
        <div class="form-input">
            <label>Question:</label>
            <input type="text" name="question" value="<?php echo $question['name'] ?>" />
        </div>
        <br>
        <br>
        <div class="form-input">
            <label>First answer</label><div style="float: left;"><input style="float: left; width: 10px;" type="radio" name="rightAnswer" value="0" <?php if($question['rightAnswer'] == 0) { echo ' checked'; } ?> /> <span> Is right answer? </span></div>
            <input type="text" name="question_answer_01" value="<?php echo $question['answer_01'] ?>" />
        </div>
        <br>
        <div class="form-input">
            <label>Second answer</label><div style="float: left;"><input style="float: left; width: 10px;" type="radio" name="rightAnswer" value="1" <?php if($question['rightAnswer'] == 1) { echo ' checked'; } ?> /> <span> Is right answer? </span></div>
            <input type="text" name="question_answer_02" value="<?php echo $question['answer_02'] ?>" />
        </div>
        <br>
        <div class="form-input">
            <label>Third answer</label><div style="float: left;"><input style="float: left; width: 10px;" type="radio" name="rightAnswer" value="2" <?php if($question['rightAnswer'] == 2) { echo ' checked'; } ?> /> <span> Is right answer? </span></div>
            <input type="text" name="question_answer_03" value="<?php echo $question['answer_03'] ?>" />
        </div>
        <br>
        <div class="form-input">
            <label>Forth answer</label><div style="float: left;"><input style="float: left; width: 10px;" type="radio" name="rightAnswer" value="3" <?php if($question['rightAnswer'] == 3) { echo ' checked'; } ?> /> <span> Is right answer? </span></div>
            <input type="text" name="question_answer_04" value="<?php echo $question['answer_04'] ?>" />
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