<?php

//$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
require_once("connection.php");
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if (isset($action) && $action == 'new-category') {


    $sql = "INSERT INTO todo_categories (name)
        VALUES ('" . $_POST["name"] . "')";

    if ($mysqli->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}

?>
<form method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
    <button name="action" value="new-category" type="submit" class="btn btn-primary">Create</button>
    <a href="index.php">Back</a>
</div>
</div>
</form>