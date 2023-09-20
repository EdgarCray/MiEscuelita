<?php

require_once "Controller/plantilla.controlador.php";
require_once "Controller/formularios.controlador.php";

require_once "Model/modelo.formulario.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrTraerPlantilla();