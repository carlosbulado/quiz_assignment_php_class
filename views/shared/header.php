<?php
require('../../repository/repositories.php');
require('../../domain/domain.php');

session_start();

$userId = $_SESSION["userId"];
$isAdmin = $_SESSION["isAdmin"];
$uri = $_SERVER['REQUEST_URI'];
$isSignUpPage = strpos($uri, 'add-user.php') !== false;

if(!$userId && !$isSignUpPage) header('Location: ../../index.php');

$logout = filter_input(INPUT_POST, 'logout');
if($logout)
{
    session_destroy();
    header('Location: ../../index.php');
}

?>
<html>
    <head>
        <title>Quiz Assignment</title>
        <meta charset="UTF-8">
        <meta name="description" content="Quiz Assignment for PHP Class in Lambton College Toronto">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript,PHP">
        <meta name="author" content="Carlos Bulado">
        <meta name="author" content="Satwinder">
        <meta name="author" content="Preetwinder">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../../assets/js/functions.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
    </head>
    <body>
        <header>
            <form id="logoutForm" method="post">
                <?php if($userId) { ?>
                    <?php if($isAdmin) { ?>
                        <nav class="topnav">
                            <a class="active" href="../home/home.php">X-Force</a>
                            <a onclick="$('#logoutForm').submit();"><span>Logout</span></a><input type="hidden" name="logout" value="1">
                            <a href="../add-user/add-user.php?id=<?php echo $userId ?>"><span>Profile</span></a>
                            <a href="../search-category/search-category.php"><span>List of Categories</span></a>
                            <a href="../search-test/search-test.php"><span>List of Tests</span></a>
                            <a href="../report-tests/report-tests.php"><span>Report of Tests</span></a>
                        </nav>
                    <?php } else { ?>
                        <nav class="topnav">
                            <a class="active" href="../home/home.php">X-Force</a>
                            <a onclick="$('#logoutForm').submit();"><span>Logout</span></a><input type="hidden" name="logout" value="1">
                            <a href="../add-user/add-user.php?id=<?php echo $userId ?>"><span>Profile</span></a>
                            <a href="../attend-test/attend-test.php"><span>Attend Test</span></a>
                            <a href="../report-tests/report-tests-student.php"><span>Report of my Tests</span></a>
                        </nav>
                    <?php } ?>
                <?php } else { ?>
                    <nav class="topnav">
                        <a class="active" href="../home/home.php">X-Force</a>
                    </nav>
                <?php } ?>
            </form>
        </header>