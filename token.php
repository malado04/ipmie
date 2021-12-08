<?php
session_start();
$_SESSION['token'] = 'abc123abc123';

?>

<form action="traitement.php" method="post">
    <input type="hidden" name="token" value="abc123abc123" />
    <input type="submit" value="Submit">
</form>