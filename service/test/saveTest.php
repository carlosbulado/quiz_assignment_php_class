<?php

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$category = filter_input(INPUT_POST, 'category');

echo $id . ' - ' . $name . ' - ' . $category;

?>