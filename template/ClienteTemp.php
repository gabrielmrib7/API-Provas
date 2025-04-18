<?php

namespace template;

class ClienteTemp implements ITemplate
{
    public function cabecalho()
    {
        echo "<div> Cabeçalho </div>";
    }

    public function rodape()
    {
        echo "<div> Rodapé </div>";
    }

    public function layout($caminho, $parametro = null)
    {
        $this->cabecalho();

        $fullPath = realpath($_SERVER["DOCUMENT_ROOT"] . "/API-Provas/" . $caminho);
        if ($fullPath && file_exists($fullPath)) {
            include $fullPath;
        } else {
            echo "<div>Erro: Arquivo '$caminho' não encontrado!</div>";
        }

        $this->rodape();
    }
}
