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
    // public function alterar(Questao $questao)
    // {
    //     return parent::alterar(Questao $questao);
    // }
    public function listarId($id)
    {
        return parent::listarId($id);
    }
}