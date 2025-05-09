<?php
namespace dao;

use models\Questao;
interface IQuestoesDAO{
    public function listar();
    public function inserir(Questao $questao);
    public function listarId($id);
    public function alterar(Questao $questao, $id);
    public function deletar($id);

    public function gerarProva($materia, $quantidade);
}