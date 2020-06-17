<?php
require_once("connection.php");

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if (isset($action) && $action == 'new-user') {

    $error = [];

            $sql = "INSERT INTO todo_users (username, password) 
        VALUES ('" . $_POST["username"] . "', '" . $_POST["password"] . "')";

            var_dump($mysqli);

            if ($mysqli->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }

            $mysqli->close();
}

?>
<h5>Add new User <a href="#">back</a></h5>

<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button name="action" value="new-user" type="submit" class="btn btn-primary">Create</button>
</form>