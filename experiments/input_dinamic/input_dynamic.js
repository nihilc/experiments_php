const item_container = document.getElementById("item_container");
const item_add = document.getElementById("item_add");

a = 0;
function add_item() {
    a++;
    item = document.createElement("div");
    item.setAttribute("id", "item_" + a);
    item.innerHTML =
        '<label for="item[]">Item</label><input type="text" name="item[]"><label for="item_note[]">Note</label><input type="text" name="item_note[]"><button type="button" id="item_del">Delete</button>';
    item_container.appendChild(item);
}

item_add.addEventListener("click", () => {
    add_item();
});
