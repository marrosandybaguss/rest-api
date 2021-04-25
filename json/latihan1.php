<?php 

// 1. Array Asosiatif convert to JSON
// $mahasiswa = [
// 	"nama" => "Marro Sandy",
// 	"nim" => "105217005",
// 	"email" => "marrosandybaguss99@gmail.com"
// ];

// $convertToJSON = json_encode($mahasiswa);
// echo $convertToJSON;

// 2. get data from db, convert to array asosiatif, convert to JSON
$dbh = new PDO('mysql:host=localhost;dbname=mkpl', 'root', '');
$db = $dbh->prepare('SELECT * FROM products');
$db->execute();
$products = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($products);
echo $data;

?>