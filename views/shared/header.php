<?php
require('../../repository/repositories.php');
require('../../domain/domain.php');

$userId = $_SESSION["userId"] ?? 1;
$isAdmin = $_SESSION["isAdmin"] ?? 1;

$logout = filter_input(INPUT_POST, 'logout');
if($logout)
{
    session_destroy();
    header('Location: ../../index.html');
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
            <?php if($isAdmin) { ?>
                <nav class="topnav">
                    <a class="active" href="#home">X-Force</a>
                    <a href="../search-test/search-test.php"><span>List of Tests</span></a>
                    <a href="../add-user/add-user.php?id=<?php echo $userId ?>"><span>Profile</span></a>
                    <form id="logoutForm" method="post"><a onclick="$('#logoutForm').submit();"><span>Logout</span></a><input type="hidden" name="logout" value="1"></form>
                </nav>
            <?php } else { ?>
                <nav class="topnav">
                    <a class="active" href="#home">X-Force</a>
                    <a href="../attend-test/attend-test.php"><span>Attend Test</span></a>
                    <a href="../add-user/add-user.php?id=<?php echo $userId ?>"><span>Profile</span></a>
                    <form id="logoutForm" method="post"><a onclick="$('#logoutForm').submit();"><span>Logout</span></a><input type="hidden" name="logout" value="1"></form>
                </nav>
            <?php } ?>
        </header>