<?php

$acc = $_POST["acc"];
$pas = $_POST["pw"];

$dsn = "mysql:dbname=Web51;host=localhost;port=3306";
$pdo = new PDO($dsn, 'admin', '1234');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$sql = "SELECT * FROM users WHERE `account`=? and `password`=?";

// $sql = "SELECT * FROM users WHERE `account`='".$acc."' and `password`='".$pas."'";
// $result = $pdo->query($sql)->fetch();

$stmt = $pdo->prepare($sql);

$msg = "Login Failed";

if ($stmt->execute(array($acc, $pas))) {
    while ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $msg = "Login Success";
        break;
    }
}

echo "<script>alert('". $msg ."');location.href = 'home.html';</script>";
?>