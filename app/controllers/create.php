<?php

include_once "../models/persona.model.php";

$data_person = array(
    'nombres' => $_POST['nombres'],
    'email' => $_POST['email'],
    'edad' => $_POST['edad']
);

echo json_encode(Persona::saveUsuario($data_person));
