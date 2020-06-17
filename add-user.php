<?php

/**
 * Created by PhpStorm.
 * User: eerik.pold
 * Date: 07.02.2019
 * Time: 14:37
 */
//TODO put correct redirects
$user = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$pw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if (isset($action) && $action == 'new-user') {

    $error = [];

    if (empty($username)) {
        $error['username'] = 'Username cannot be empty';
    }

    if (empty($password)) {
        $error['password'] = 'Password cannot be empty';
    }

    if (empty($error)) {

        $servername = "d82908.mysql.zonevs.eu";
        $username = "d82908_todo";
        $password = "TAK17eksam";
        $dbname = "d82908_todo";

// Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        echo "database connected";
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO todo_users (username, password)
        VALUES ('$user', '$pw')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
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