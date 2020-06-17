<?php
require_once("connection.php");

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$category = "DELETE FROM todo_categories WHERE id = '$id'";
$result = $mysqli->query($category);
  header("location: index.php");