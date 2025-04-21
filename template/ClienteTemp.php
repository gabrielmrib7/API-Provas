<?php

namespace template;

class ClienteTemp implements ITemplate
{
   

    public function layout($caminho, $parametro = null)
    {
        

        $fullPath = realpath($_SERVER["DOCUMENT_ROOT"] . "/API-Provas/" . $caminho);
        if ($fullPath && file_exists($fullPath)) {
            include $fullPath;
        } else {
            echo "<div>Erro: Arquivo '$caminho' não encontrado!</div>";
        }

       
    }
}
