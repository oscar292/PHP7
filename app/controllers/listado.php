<?php

include_once "../models/persona.model.php";

echo json_encode(Persona::listarPersonas());