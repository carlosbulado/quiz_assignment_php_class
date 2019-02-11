<?php
require('../../repository/repositories.php');
require('../../domain/domain.php');

$userId = $_SESSION["userId"] ?? 0;
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
    </head>
    <body>