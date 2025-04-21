<?php
// Exibir todos os erros na tela (ótimo para desenvolvimento)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Autoload e uso do Controller
require_once 'generic/Autoload.php';

use generic\Controller;

// Se houver parâmetro 'param' passado na URL (?param=...)
if (isset($_GET["param"])) {
    $controller = new Controller();
    $controller->verificarChamadas($_GET["param"]);
} else {
    // Se não houver parâmetro, pode mostrar uma página padrão,
    // ou simplesmente não fazer nada (personalize abaixo se desejar)
    echo "Bem-vindo ao sistema de provas!";
}