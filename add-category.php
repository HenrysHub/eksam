<?php

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
?>

<form method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
    <button name="action" value="new-category" type="submit" class="btn btn-primary">Create</button>


</div>
</div>
</form>