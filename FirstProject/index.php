<?php
header('content-Type: text/html;charset=UTF-8');
$user = 'db';
$pass = '123';
$db = new PDO('mysql:host=localhost;dbname=test',
$user, $pass,
[PDO::ATTR_PERSISTENT => true,
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

try {
$stmt = $db->prepare("INSERT INTO application SET name = ?");
$stmt -> execute(['fio']);
}
catch(PDOException $e){
print('Error : ' . $e->getMessage());
exit();
}

$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email)
VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();
