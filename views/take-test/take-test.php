<?php include('../shared/header.php'); ?>
<?php 
$id = filter_input(INPUT_GET, 'id');
$test = new Test();
$testRep = new TestRepository();
$questionRep = new QuestionRepository();
$test = $testRep->getById($id);

if ($_POST)
{
    $allQuestions = filter_input(INPUT_POST, 'allQuestions');
    $allQuestionsIds = explode(',', filter_input(INPUT_POST, 'allQuestionsIds'));
    $allAnswers = explode(',', filter_input(INPUT_POST, 'allAnswers'));
    $last_id = $testRep->saveTestDone($id, $test['name'], $test['categoryId'], $userId);

    foreach($test['questions'] as $question)
    {
        for($i = 0 ; $i < $allQuestionsIds ; $i++)
        {
            if($question['id'] == $allQuestionsIds[$i])
            {
                $questionRep->saveQuestionDone($question['name'], $last_id, $allAnswers[$i], $question['answer_01'], $question['answer_02'], $question['answer_03'], $question['answer_04'], intval($question['rightAnswer']) + 1 == intval($allAnswers[$i]) ? 1 : 0);
                break;
            }
        }
    }

    header('Location: ../score-test/score-test.php?id=' . $last_id);
}
?>
<main>
    <a href="../attend-test/attend-test.php">All Test</a>
    <form method="post">
        <div>
            <div>
                <label>Test:</label>
                <span><?php echo $test['name'] ?></span>
            </div>
            <input type="hidden" id="allQuestions" name="allQuestions" >
            <input type="hidden" id="allQuestionsIds" name="allQuestionsIds" >
            <input type="hidden" id="allAnswers" name="allAnswers" >
            <div>
                <label><span id="questionNumber"></span>. Question:</label>
                <br>
                <p><span id="questionNow"></span></p>
                <input type="hidden" id="questionIdNow" value="-1">
            </div>
            <div>
                A. <input type="radio" name="answerQuestion" class="question_radio" value="1"><span id="question_name_01"></span>
            </div>
            <br>
            <div>
                B. <input type="radio" name="answerQuestion" class="question_radio" value="2"><span id="question_name_02"></span>
            </div>
            <br>
            <div>
                C. <input type="radio" name="answerQuestion" class="question_radio" value="3"><span id="question_name_03"></span>
            </div>
            <br>
            <div>
                D. <input type="radio" name="answerQuestion" class="question_radio" value="4"><span id="question_name_04"></span>
            </div>
            <br>
            <br>
            <div>
                <button type="button" onclick="loadQuestion()">Next</button>
            </div>
        </div>
    </form>
</main>

<script>
    var test = <?php echo json_encode($test); ?>;
</script>
<script src="take-test.js"></script>
<?php include('../shared/footer.php'); ?>