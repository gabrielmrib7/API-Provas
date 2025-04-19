<script>
      function editarQuestoes(id) {
        const linha = document.getElementById(id);

// Habilita inputs e textareas desabilitados
const inputs = linha.querySelectorAll('input:disabled, textarea:disabled');
inputs.forEach(el => {
  el.disabled = false;
});

// Mostra o <select>
const select = linha.querySelector('select');
if (select) {
  select.style.display = 'inline';
}

// Esconde o texto da alternativa correta (A, B, C, D)
const alternativaTexto = select?.previousSibling;
if (alternativaTexto && alternativaTexto.nodeType === Node.TEXT_NODE) {
  alternativaTexto.textContent = ''; // limpa o texto da alternativa
}

// Mostra o botão "Update"
const btnUpdate = linha.querySelector('input[name="btnUpdate"]');
if (btnUpdate) {
  btnUpdate.style.display = 'inline';
}

// Esconde o botão "Editar"
const btnEditar = linha.querySelector('button[onclick^="editarQuestoes"]');
if (btnEditar) {
  btnEditar.style.display = 'none';
}

console.log(`Editando questão ID: ${id}`);
  }

  function deletarQuestao(id) {
    if (confirm('Tem certeza que deseja deletar essa questão?')) {
        const form = document.getElementById(`form ${id}`);
        form.action = `/API-Provas/?param=questoes/deletar&id=${id}`;
        form.submit();
    }
}
</script>


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
    <form id="form <?= $p["Id"] ?>" method="POST" action="/API-Provas/questoes/alterar&id=<?=$p["Id"]?>">
    <tr id="<?= $p["Id"]?>">
        <td name="id"><?= $p["Id"] ?></td>
        <td><textarea disabled type="text" name="enunciado"><?= $p["Enunciado"] ?></textarea></td>
        <td><input disabled type="text" name="materia" value="<?= $p["Materia"] ?>"></td>
        <td><textarea disabled type="text" name="a"><?= $p["A"] ?></textarea></td>
        <td><textarea disabled type="text" name="b"><?= $p["B"] ?></textarea></td>
        <td><textarea disabled type="text" name="c"><?= $p["C"] ?></textarea></td>
        <td><textarea disabled type="text" name="d"><?= $p["D"] ?></textarea></td>
        <td colspan="2"><?= chr($p["AlternativaCorreta"]+64) ?>
            <select name="correta" style="display: none">
            <option value="1">Alternativa A</option>
            <option value="2">Alternativa B</option>
            <option value="3">Alternativa C</option>
            <option value="4">Alternativa D</option>
            </select>
        </td>
        <td><button type="button" onClick="editarQuestoes(<?=$p["Id"]?>)">Editar</button>
        <input style="display: none" name="btnUpdate" type="submit" value="Update">
        </td>
        <td><button onClick="deletarQuestao(<?=$p["Id"]?>)">Deletar</button></td>
    </tr>
    </form>
    
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