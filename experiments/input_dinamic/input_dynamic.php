<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="post">
        <!-- inputs -->
        <div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="date">Date</label>
                <input type="date" name="date">
            </div>
        </div>
        <!-- items -->
        <div id="item_container">
            <div id="item_0">
                <label for="item[]">Item</label>
                <input type="text" name="item[]">
                <label for="item_note[]">Note</label>
                <input type="text" name="item_note[]">
                <button type="button" id="item_del">Delete</button>
            </div>
        </div>
        <button type="button" id="item_add">Add</button>
        <button type="submit">Save</button>
    </form>
    <script src="./input_dynamic.js"></script>

    <pre><?php print_r($_POST) ?></pre>
</body>
</html>