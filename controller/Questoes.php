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
      $resultado= $service->listarQuestoes();
       $this->template->layout("\\public\\questoes\\listar.php",$resultado);
    }

    // public function inserir()
    // {
    //     $nome = $_POST["nome"];
    //     $endereco = $_POST["endereco"];
    //    $service = new QuestoesService();
    //   $resultado= $service->inserir($nome,$endereco);
    //    header("location: /mvc20251/cliente/lista?info=1");
    // }

    public function formulario()
    {
     
       $this->template->layout("\\public\\questoes\\form.php");
    }
    public function alterarForm()
    {
        $id=$_GET["id"];
        $service = new QuestoesService();
        $resultado =$service->listarId($id);
        
       $this->template->layout("\\public\\questoes\\form.php",$resultado);
    }
}
