<?php
namespace service;

use dao\mysql\QuestoesDAO;
use models\Questao;

class QuestoesService extends QuestoesDAO{
    public function listarQuestoes(){
        
        return parent::listar();
    }

    public function inserir(Questao $questao){
        return parent::inserir($questao);
    }
    public function alterar(Questao $questao, $id)
    {
        return parent::alterar( $questao, $id);
    }
    public function listarId($id)
    {
        return parent::listarId($id);
    }

    public function gerarProva($materia, $quantidade)
    {
        return parent::gerarProva($materia, $quantidade);
    }
}