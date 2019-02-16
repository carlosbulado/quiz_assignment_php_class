<?php include('../shared/header.php'); ?>
<main>
    <?php if($isAdmin) { ?>
        <h1>Hello and welcome to the Quiz Assignment for PHP class!</h1>
        <h3>As a administrator, you can add/edit categories, tests, questions and see reports of students who attend to tests!</h3>
        <p>Use the menu at the top to navigate through the application.</p>
    <?php } else { ?>
        <h1>Hello and welcome to the Quiz Assignment for PHP class!</h1>
        <h3>As a student, you can attend to tests and see your results!</h3>
        <p>Use the menu at the top to navigate through the application.</p>
    <?php } ?>
</main>
<?php include('../shared/footer.php'); ?>