<?php
namespace dao\mysql;

use dao\IQuestoesDAO;
use generic\MysqlFactory;
use models\Questao;

class QuestoesDAO extends MysqlFactory implements IQuestoesDAO{
    
    public function listar() {
        $sql = "SELECT * FROM questoes";
        return $this->banco->executar($sql);
    }

    public function listarId($id) {
        $sql = "SELECT * FROM questoes WHERE id = :id";
        $param = [':id' => $id];
        return $this->banco->executar($sql, $param);
    }

    public function inserir(\Models\Questao $questao)
    {
        $sql = "INSERT INTO questoes 
            (Enunciado, Materia, A, B, C, D, AlternativaCorreta)
            VALUES 
            (:Enunciado, :Materia, :A, :B, :C, :D, :AlternativaCorreta)";
    
        $param = [
            ':Enunciado' => $questao->Enunciado,
            ':Materia' => $questao->Materia,
            ':A' => $questao->A,
            ':B' => $questao->B,
            ':C' => $questao->C,
            ':D' => $questao->D,
            ':AlternativaCorreta' => $questao->AlternativaCorreta,
        ];
    
        return $this->banco->executar($sql, $param);
    }

    public function deletar($id) {
        $sql = "DELETE FROM questoes WHERE id = :id";
        $param = [':id' => $id];
        return $this->banco->executar($sql, $param);
    }
}