<?php

$pdo=new PDO("mysql:dbname=blog;host=localhost","root","");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['Id_post'];

$statement=$pdo->prepare("SELECT * FROM post WHERE Id_post = $id");
$statement->execute();

if (!$statement){
    echo json_encode('Error al ejecutar la consulta');
}else{
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($results);
}
