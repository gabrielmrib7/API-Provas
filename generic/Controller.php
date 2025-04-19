<?php
namespace generic;
class Controller{
    private $arrChamadas=[];
    public function __construct()
    {
        $this->arrChamadas = [
            "questoes/lista" =>new Acao("Questoes","listar"),
            "questoes/formulario" =>new Acao("Questoes","formulario"),
            "questoes/alterar" =>new Acao("Questoes","alterar"),
            "questoes/inserir" =>new Acao("Questoes","inserir"),
            "questoes/deletar" =>new Acao("Questoes","deletar")
           
        ];
    }

    public function verificarChamadas($rota){
       
        if(isset($this->arrChamadas[$rota])){
            //acao da rota
            $acao = $this->arrChamadas[$rota];
            $acao->executar();
            return ;
        }

        echo "Rota não existe!";
    }
}