<?php

function validateRequest(string $request){
    if ($_SERVER["REQUEST_METHOD"] !== $request) {
        print_r("Invalid request method $request");
        return false;
    }
    print_r("Valid request method $request");
    return true;
}

?>

<?php validateRequest('POST'); ?>
<form action="" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="submit" value="POST" name="post">
</form>
<?php validateRequest('GET'); ?>
<form action="" method="get">
    <input type="text" name="name" placeholder="name">
    <input type="submit" value="GET" name="get">
</form>