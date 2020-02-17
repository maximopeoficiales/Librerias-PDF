<?php
$registros = array();
$mysqli = new mysqli("localhost", "root", "", "registros", 3307);
$mysqli->set_charset('utf8');
$statement = $mysqli->prepare("SELECT * FROM datos");
$statement->execute();
$resultado = $statement->get_result();
/* obtengo los datos y los guarda en registros */
while ($row = $resultado->fetch_assoc()) $registros[] = $row;
$mysqli->close();
