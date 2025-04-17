<?php
require_once 'generic/Autoload.php';

use generic\Controller;

if (isset($_GET["param"])) {
    $controller = new Controller();
    $controller->verificarChamadas($_GET["param"]);
}
