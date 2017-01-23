<?php

include('./credentials.php');
header('Content-Type: application/json');

$db = new PDO('mysql:host=localhost;dbname=budget;charset=utf8mb4', $dbuser, $dbpass);
unset($dbuser); unset($dbpass);

$stmt = $db->query("SELECT * FROM `transactions`");
$json = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = array('name' => 'Transactions, last 30 days', 'transactions' => $json);
echo(json_encode($json));