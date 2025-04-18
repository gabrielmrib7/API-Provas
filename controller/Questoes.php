<?php

namespace controller;

use service\ClienteService;
use service\QuestoesService;
use template\ClienteTemp;
use template\ITemplate;

class Questoes
{
    private ITemplate $template;

    public function __construct()
    {
        $this->template = new ClienteTemp();
    }

    public function listar()
    {
        $service = new QuestoesService();
        $resultado = $service->listarQuestoes();
        // Corrigido caminho do arquivo de view:
        $this->template->layout(caminho: "public/questoes/listar.php", parametro: $resultado);
    }

   
    public function inserir()
{
    // Pegando os dados do formulário
    $enunciado = $_POST["enunciado"] ?? '';
    $materia = $_POST["materia"] ?? '';
    $a = $_POST["a"] ?? '';
    $b = $_POST["b"] ?? '';
    $c = $_POST["c"] ?? '';
    $d = $_POST["d"] ?? '';
    $correta = $_POST["correta"] ?? '';

    // Cria o objeto Questao (ajustando namespace!)
    $questao = new \Models\Questao();
    $questao->Enunciado = $enunciado;
    $questao->Materia = $materia;
    $questao->A = $a;
    $questao->B = $b;
    $questao->C = $c;
    $questao->D = $d;
    $questao->AlternativaCorreta = $correta;

    $service = new QuestoesService();
    $service->inserir($questao);

    // Redireciona para a lista após inserir
    header("Location: /API-Provas/?param=questoes/lista");
    exit();
}

    public function formulario()
    {
        // Corrigido caminho do arquivo de view:
        $this->template->layout(caminho: "public/questoes/form.php");
    }

    public function alterarForm()
    {
        $id = $_GET["id"] ?? null;
        $service = new QuestoesService();
        $resultado = $service->listarId($id);
        // Corrigido caminho do arquivo de view:
        $this->template->layout(caminho: "public/questoes/form.php", parametro: $resultado);
    }
}