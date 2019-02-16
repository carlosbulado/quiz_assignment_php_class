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
    <button onclick="loation.href = '../attend-test/attend-test.php'">Quit Test</button>
    <br>
    <br>
    <form method="post">
        <div>
            <div class="div-take-test">
                <label>Test:</label>
                <span><?php echo $test['name'] ?></span>
            </div>
            <br>
            <br>
            <br>
            <input type="hidden" id="allQuestions" name="allQuestions" >
            <input type="hidden" id="allQuestionsIds" name="allQuestionsIds" >
            <input type="hidden" id="allAnswers" name="allAnswers" >
            <div class="div-question-answers">
                <div>
                    <label><span id="questionNumber"></span>. Question:</label>
                    <br>
                    <p><span id="questionNow"></span></p>
                    <input type="hidden" id="questionIdNow" value="-1">
                </div>
                <div class="options">
                    A. <input type="radio" name="answerQuestion" class="question_radio" id="r1" value="1"><span id="question_name_01"></span>
                </div>
                <br>
                <div class="options">
                    B. <input type="radio" name="answerQuestion" class="question_radio" id="r2" value="2"><span id="question_name_02"></span>
                </div>
                <br>
                <div class="options">
                    C. <input type="radio" name="answerQuestion" class="question_radio" id="r3" value="3"><span id="question_name_03"></span>
                </div>
                <br>
                <div class="options">
                    D. <input type="radio" name="answerQuestion" class="question_radio" id="r4" value="4"><span id="question_name_04"></span>
                </div>
                <br>
                <br>
                <div>
                    <button class="next-btn" id="prev-question" type="button" onclick="loadPreviousQuestion()">Previous Question</button>
                    <button class="next-btn" type="button" onclick="loadQuestion()">Next Question</button>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    var test = <?php echo json_encode($test); ?>;
</script>
<script src="take-test.js"></script>
<?php include('../shared/footer.php'); ?>