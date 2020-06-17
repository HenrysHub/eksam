<?php

$mysqli = new mysqli(
    "d82908.mysql.zonevs.eu",
    "d82908_todo",
    "TAK17eksam",
    "d82908_todo"
);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}