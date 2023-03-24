<form action="" method="post">
    <!-- inputs -->
    <div>
        <span>-- Info --</span>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date">
        </div>
        <div>
            <label for="worker">Worker</label>
            <input type="text" name="worker">
        </div>
    </div>
    <!-- items -->
    <div id="items_container">
        <span>-- Items --</span>
    </div>
    <button type="button" onclick="add_item()">Add Item</button>
    <button type="submit">Save</button>
</form>
<script>
    const items_container = document.getElementById('items_container');
    a = 0;
    function add_item() {
        a++;
        let item = document.createElement("div");
        item.setAttribute("id", "item_" + a);
        item.innerHTML =
            '<label for="items[]">Code</label>' +
            '<input type = "text" name = "items[]">' +
            '<label for="notes[]">Note</label>' +
            '<input type="text" name="notes[]">' +
            '<button type="button" onclick="del_item(' + a + ')">Delete</button>';
        items_container.appendChild(item);
    }
    function del_item(id) {
        let item = document.getElementById('item_' + id);
        item.parentNode.removeChild(item);
    }
</script>
<pre><?php print_r($_POST) ?></pre>