<?php

$host='postgres-container';
$db = 'fusionpbx';
$username = 'fusionpbx';
$password = 'MFhMkW9wnCtg2yKdsbiBoFWKDA';
 
$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
 
try{
 // create a PostgreSQL database connection
 $conn = new PDO($dsn);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  display a message if connected to the PostgreSQL successfully
//  if($conn){
//    echo "Connected to the <strong>$db</strong> database successfully!";
// }
} catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

?>