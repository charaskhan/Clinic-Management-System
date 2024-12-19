<?php
$conn = new mysqli('localhost', 'pnako16', 'epoka123', 'web18_pnako16');
if($conn->connect_error){
    die("Fatal Error: Can't connect to database: ". $conn->connect_error);
}
?>