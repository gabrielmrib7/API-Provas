<?php
namespace models;

class Questao {
    public $id;
    public $pergunta;
    public $materia;
    public $alternativa_a;
    public $alternativa_b;
    public $alternativa_c;
    public $alternativa_d;
    public $correta;

    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->pergunta = $data['pergunta'] ?? null;
        $this->materia = $data['materia'] ?? null;
        $this->alternativa_a = $data['alternativa_a'] ?? null;
        $this->alternativa_b = $data['alternativa_b'] ?? null;
        $this->alternativa_c = $data['alternativa_c'] ?? null;
        $this->alternativa_d = $data['alternativa_d'] ?? null;
        $this->correta = $data['correta'] ?? null;
    }
}
