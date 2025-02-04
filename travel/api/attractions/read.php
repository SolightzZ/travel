<?php 
header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json; charset=UTF-8"); 
include '../db.php'; 
try { 
$attractions = array(); 
foreach($dbh->query('SELECT * from attractions') as $row) { 
$attraction = array( 
'id' => $row['id'], 
'name' => $row['name'], 
'coverimage' => $row['coverimage'], 
'detail' => $row['detail'], 
); 
array_push($attractions, $attraction); 
} 
echo json_encode($attractions); 
$dbh = null; 
} catch (PDOException $e) { 
print "Error!: ". $e->getMessage(). "<br/>"; 
die(); 
} 
?>