<?php

$pdo=new PDO("mysql:dbname=blog;host=localhost","root","");
$statement=$pdo->prepare("SELECT * FROM post");
$statement->execute();

if (!$statement){
    echo json_encode('Error al ejecutar la consulta');
}else{
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($results);
}
