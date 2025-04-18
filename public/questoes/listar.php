<head>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #888;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f3f3f3;
        }
    </style>
</head>
<a href="/provas/questoes/formulario">Cadastrar</a>
<table>
    <tr>
        <th>ID</th>
        <th>Enunciado</th>
        <th>Materia</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>D</th>
        <th colspan="2">Correta</th>
        <th></th>
        <th></th>
</tr>
<?php
 foreach( $parametro as $p){
    ?>
    <tr>
        <td><?= $p["Id"] ?></td>
        <td><?= $p["Enunciado"] ?></td>
        <td><?= $p["Materia"] ?></td>
        <td><?= $p["A"] ?></td>
        <td><?= $p["B"] ?></td>
        <td><?= $p["C"] ?></td>
        <td><?= $p["D"] ?></td>
        <td colspan="2"><?= $p["AlternativaCorreta"] ?></td>
        <td><button>Deletar</button></td>
        <td><button>Editar</button></td>
        
    </tr>
    
    <?php
 }

?>
<form method="POST" action="/API-Provas/?param=questoes/inserir">
<tr>
        <td></td>
        <td><textarea type="text" name="enunciado"></textarea></td>
        <td><input type="text" name="materia"></td>
        <td><input type="text" name="a"></td>
        <td><input type="text" name="b"></td>
        <td><input type="text" name="c"></td>
        <td><input type="text" name="d"></td>
        <td colspan="2">
    <select name="correta">
        <option value="1">Alternativa A</option>
        <option value="2">Alternativa B</option>
        <option value="3">Alternativa C</option>
        <option value="4">Alternativa D</option>
    </select>
        </td>
        <td colspan="2"><input type="submit" value="enviar" /></td>
        
    </tr>
</form>   
</table>