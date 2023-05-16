<?php
include 'model.php';

$registro= new Model('tbl_alumno');

$arreglo=['uno'=>1,'dos'=>2,'tres'=>3];

print($registro->insert($arreglo));


