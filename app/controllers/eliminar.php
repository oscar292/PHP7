<?php

require_once "../models/persona.model.php";
echo json_encode(Persona::eliminar($_POST['id']));
