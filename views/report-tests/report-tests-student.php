<?php include('../shared/header.php'); ?>
<?php 
$testsDoneRep = new TestRepository();
$allTestsDone = $testsDoneRep->getAllTestDoneByUser($userId);
?>
<main>
    <section class="alone-section">
        <br>
        <br>
        <form method="post">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Student</th>
                    <th>Date</th>
                    <th>Marks</th>
                    <th></th>
                </tr>
                <tbody id="search-test-table">
                    <?php foreach($allTestsDone as $test) { 
                        $dbQuestions = new Database();
                        $dbQuestions->connect();
                        $dbQuestions->prepare('SELECT * FROM questions_done WHERE testId = :testId');
                        $dbQuestions->bindParam(':testId', $test['id']);
                        $dbQuestions->execute();
                        $test['questions'] = $dbQuestions->$result;
                        $dbQuestions->close();
                        $count = 0;
                        foreach($test['questions'] as $question)
                        {
                            if($question['isCorrect'] == 1) $count++;
                        }
                    ?>
                        <tr>
                            <td><?php echo $test['name']; ?></td>
                            <td><?php echo $test['category_name']; ?></td>
                            <td><?php echo $test['UserName']; ?></td>
                            <td><?php echo $test['date']; ?></td>
                            <td><?php echo $count . ' / 20'; ?></td>
                            <td><?php echo ($count >= 10) ? 'Pass' : 'Fail'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </section>
</main>

<script>
    var allTestsDone = <?php echo json_encode($allTestsDone); ?>;
</script>
<script>
    setTitle('Report of Tests Done'); 
</script>

<?php include('../shared/footer.php'); ?>