<?php
session_start();
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

<ul class="list" id="sortable">
    <li class="ui-state-default">Item 1.2</li>
    <li class="ui-state-default">Item 2.2</li>
    <li class="ui-state-default">Item 3</li>
    <li class="ui-state-default">Item 4</li>
    <li class="ui-state-default">Item 5</li>
    <li class="ui-state-default">Item 6</li>
    <li class="ui-state-default">Item 7</li>
</ul>


</body>
</html>