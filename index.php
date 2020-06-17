<?php
session_start();
require_once("connection.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo List</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable" ).sortable({
                placeholder: "ui-state-highlight"
            });
            $( "#sortable" ).disableSelection();
        } );
    </script>
</head>
<body>
<header class="nav">
    <div class="todo">To Do List</div>
    <?php
        if($_SESSION['login_user'] == NULL){?>
            <a class="login" href="login.php">Login</a><?php
        }else{
            ?><a class="login" href="logout.php">Logout</a><?php
        }
        ?>
</header>
<a href="add-category.php">Add category</a>
<?php

$category = 'SELECT * FROM todo_categories';
$result = $mysqli->query($category);

if ($result->num_rows > 0) {
    // output data of each row
    ?><ul class="list" id="sortable"><?php
    while($row = $result->fetch_assoc()) {

        ?><li class="ui-state-default"><?php echo  $row["name"];?>
        <form method="post" action="delete-category.php">
            <input type="hidden" name="id" value="<?php echo $row["id"];?>">

        <a><button style="background-color: #cc0000; color: white;">X</button></a>
        </form>
        </li><?php

    }?>
    </ul><?php
} else {
    echo "0 results";
}
?>
</body>
</html>