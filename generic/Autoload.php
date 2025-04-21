<?php
spl_autoload_register(function ($classe) {
    $caminho = str_replace("\\", DIRECTORY_SEPARATOR, $classe) . ".php";
    if (file_exists($caminho)) {
        include $caminho;
    }
});