<?php

namespace template;

class ClienteTemp implements ITemplate
{
    public function cabecalho() {
        echo "Cabeçalho<br>";
    }

    public function rodape() {
        echo "<br>Rodapé";
    }

    public function layout($caminho, $parametro = null)
    {
        // Caminho absoluto até o arquivo a ser incluído
        $arquivo = __DIR__ . '/../' . $caminho;

        // Exibe o cabeçalho
        $this->cabecalho();

        // Verifica se o arquivo existe, inclui, caso contrário mostra mensagem de erro
        if (file_exists($arquivo)) {
            include $arquivo;
        } else {
            echo "Erro: Arquivo '{$caminho}' não encontrado!";
        }

        // Exibe o rodapé
        $this->rodape();
    }
}