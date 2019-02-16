<?php include('../shared/header.php'); ?>
<?php 
$id = filter_input(INPUT_GET, 'id');
$testRep = new TestRepository();
$testDone = $testRep->getTestDoneById($id);
$test = $testRep->getById($testDone['testId']);

$count_questions = 1;
$total_corrects = 0;
?>
<main>
    <div>
        <div>
            <label>Test Done:</label>
            <?php echo $testDone['name'] ?>
        </div>
        <br>
        <div>
            <?php foreach($testDone['questions'] as $question) { ?>
                <div>
                    <label><?php echo $count_questions++ ?>. Question:</label>
                    <?php echo $question['name'] ?>
                </div>
                <div>
                    <label>Option Selected:</label>
                    <?php 
                        switch($question['optionSelected'])
                        {
                            case 1:
                            echo $question['answer_01'];
                            if($question['isCorrect'] == 1)
                            {
                                echo ' - Correct Answer';
                                $total_corrects++;
                            }
                            break;
                            case 2:
                            echo $question['answer_02'];
                            if($question['isCorrect'] == 1)
                            {
                                echo ' - Correct Answer';
                                $total_corrects++;
                            }
                            break;
                            case 3:
                            echo $question['answer_03'];
                            if($question['isCorrect'] == 1)
                            {
                                echo ' - Correct Answer';
                                $total_corrects++;
                            }
                            break;
                            case 4:
                            echo $question['answer_04'];
                            if($question['isCorrect'] == 1)
                            {
                                echo ' - Correct Answer';
                                $total_corrects++;
                            }
                            break;
                            default:
                            echo 'No option selected';
                            break;
                        }
                    ?>
                </div>
                <br>
            <?php } ?>
        </div>
        <div>
            <label>Marks:</label>
            <?php echo $total_corrects . ' / ' . count($testDone['questions']) ?>
        </div>
        <div>
            <?php echo 'You ' . ($total_corrects >= count($testDone['questions'] / 2) ? 'Pass! Congratulations!' : 'Fail!') ?>
        </div>
        <div>
            <label></label>
            <span></span>
        </div>
    </div>
</main>
<?php include('../shared/footer.php'); ?>