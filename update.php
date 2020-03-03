<?php
require("Class/CRUD.php");
$var = new CRUD("127.0.0.1","root","usbw","MDI");
$var->conn();
if(@$_POST) {
    $column = $_POST['column'];
    $value = $_POST['value'];
    $where = $_POST['condition'];
    $var->update("registro", $column, $value, $condition);
}
$var->disconnect();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD INDEX</title>
</head>
<body>
<form method="post">
    <input type="text" name="column">
    <input type="text" name="value">
    <input type="text" name="condition">
    <input type="submit">
</form>
</body>
</html>
