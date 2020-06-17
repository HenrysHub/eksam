<?php

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
?>

<form method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
    </div>

    <div class="form-group">
        <label for="parent">Main1</label>
        <select name="parent" class="custom-select">
            <option>-</option>
            <?php if (!empty($mainCategories)) : foreach ($mainCategories as $mainCategory) { ?>
                <option value="<?php echo $mainCategory->ID; ?>"><?php echo $mainCategory->name; ?></option>
            <?php } endif; ?>
        </select>
        </div>
    <button name="action" value="new-category" type="submit" class="btn btn-primary">Create</button>


</div>
</div>
</form>