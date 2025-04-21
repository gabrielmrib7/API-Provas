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

    public function gerarProva($materia, $quantidade)
    {
        $quantidade = max(1, min(intval($quantidade), 50));
        if($materia == "Geral")
        {
            $sql = "SELECT * FROM questoes ORDER BY RAND() LIMIT $quantidade";
            return $this->banco->executar($sql);
        }
        else{
        $sql = "SELECT * FROM questoes WHERE Materia = :materia ORDER BY RAND() LIMIT $quantidade";
         $param = [
            ':materia' => $materia
        ];
        }

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

    public function alterar(\Models\Questao $questao, $id)
    {
        
        $sql = "UPDATE questoes 
        SET 
            Enunciado = :Enunciado,
            Materia = :Materia,
            A = :A,
            B = :B,
            C = :C,
            D = :D,
            AlternativaCorreta = :AlternativaCorreta
        WHERE 
            Id = :Id";

    $param = [
        ':Enunciado' => $questao->Enunciado,
        ':Materia' => $questao->Materia,
        ':A' => $questao->A,
        ':B' => $questao->B,
        ':C' => $questao->C,
        ':D' => $questao->D,
        ':AlternativaCorreta' => $questao->AlternativaCorreta,
        ':Id' => $id
    ];

    return $this->banco->executar($sql, $param);
    }

    public function deletar($id) {
        $sql = "DELETE FROM questoes WHERE id = :id";
        $param = [':id' => $id];
        return $this->banco->executar($sql, $param);
    }
}