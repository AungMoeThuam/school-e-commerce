<?php
$request = json_decode(file_get_contents('php://input'));
var_dump($request);

echo json_encode($request);
