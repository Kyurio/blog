<?php

  //conexion a bs basica -- se incluira en todo el modulo de prorrogas online

$mysqli = new mysqli("localhost", "root", "", "blog");
if ($mysqli->connect_errno) {
  echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
