<?php

/*
	This is the main include file.
	It is only used in index.php and keeps it much cleaner.
*/
ini_set('display_errors',0);
require_once "core/config.php";
require_once "core/connect.php";
require_once "core/helpers.php";

require_once "app/models/matricula.model.php";
require_once "app/models/matricula.detalle.model.php";
require_once "app/models/asignatura.model.php";

require_once "app/controllers/home.controller.php";
require_once "app/controllers/matriculas.controller.php";

// This will allow the browser to cache the pages of the store.
header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header("Last-Modified: ".gmdate("D, d M Y H:i:s",time())." GMT");
header("Expires: ".gmdate("D, d M Y H:i:s",time()+3600)." GMT");

?>