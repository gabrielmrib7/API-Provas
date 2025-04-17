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

    public function inserir(Questao $questao) {
        $sql = "INSERT INTO questoes 
                (pergunta, materia, alternativa_a, alternativa_b, alternativa_c, alternativa_d, correta) 
                VALUES 
                (:pergunta, :materia, :a, :b, :c, :d, :correta)";
        
        $param = [
            ':pergunta' => $questao->pergunta,
            ':materia' => $questao->materia,
            ':a' => $questao->alternativa_a,
            ':b' => $questao->alternativa_b,
            ':c' => $questao->alternativa_c,
            ':d' => $questao->alternativa_d,
            ':correta' => $questao->correta,
        ];

        return $this->banco->executar($sql, $param);
    }

    // public function alterar(Questao $questao) {
    //     $sql = "UPDATE questoes SET 
    //                 pergunta = :pergunta, 
    //                 materia = :materia,
    //                 alternativa_a = :a,
    //                 alternativa_b = :b,
    //                 alternativa_c = :c,
    //                 alternativa_d = :d,
    //                 correta = :correta 
    //             WHERE id = :id";
        
    //     $param = [
    //         ':id' => $questao->id,
    //         ':pergunta' => $questao->pergunta,
    //         ':materia' => $questao->materia,
    //         ':a' => $questao->alternativa_a,
    //         ':b' => $questao->alternativa_b,
    //         ':c' => $questao->alternativa_c,
    //         ':d' => $questao->alternativa_d,
    //         ':correta' => $questao->correta,
    //     ];

    //     return $this->banco->executar($sql, $param);
    // }

    public function deletar($id) {
        $sql = "DELETE FROM questoes WHERE id = :id";
        $param = [':id' => $id];
        return $this->banco->executar($sql, $param);
    }
    }
