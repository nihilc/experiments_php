<p>Aquí estoy probando que me entrega y como puedo usar un datalist y el poder de búsqueda que este me ofrece</p>
<form action="" method="post">
    <label for="item">items</label>
    <input type="text" name="item" id="item" list="itemList">
    <button type="submit">Enviar</button>
</form>
<datalist id="itemList">
    <option value="123">Uno Dos Tres</option>
    <option value="abc">A Be Ce </option>
    <option value="zxy">Zeta Equis Ye</option>
</datalist>
<pre>
    <?php print_r($_POST); ?>
</pre>