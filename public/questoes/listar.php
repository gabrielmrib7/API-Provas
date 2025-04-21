<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Questões</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    textarea.form-control { resize: vertical; min-height: 38px; }
    table.table td, table.table th { vertical-align: middle; }
    .table-form-row td { background: #f9fbfd; }
    body { background: #f6f7fb; }
    /* Ajuste para preencher mais a tela: */
    .container {
      background: #fff;
      /* agora mais larga que o default do bootstrap */
      max-width: 98vw;
      width: 100%;
      padding: 2rem;
      border-radius: 14px;
      box-shadow: 0 2px 10px #0001;
      min-width: 1150px;
    }
    @media (max-width: 1300px) {
      .container { min-width: 900px; }
    }
    @media (max-width: 991px) {
      .container { min-width: unset; padding: 1rem;}
      table.table { font-size: 0.95rem;}
    }
  </style>
</head>
<body>
<div class="container mt-4">
  <h2 class="mb-4">Gestão de Questões</h2>
  <table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Enunciado</th>
        <th>Matéria</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>D</th>
        <th colspan="2">Correta</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $parametro as $p){ ?>
      <form id="form <?= $p["Id"] ?>" method="POST" action="/API-Provas/questoes/alterar&id=<?=$p["Id"]?>">
      <tr id="<?= $p["Id"] ?>">
        <td><?= $p["Id"] ?></td>
        <td>
          <textarea disabled class="form-control" name="enunciado"><?= $p["Enunciado"] ?></textarea>
        </td>
        <td>
          <?= $p["Materia"] ?>
          <select name="materia" class="form-select mt-2" style="display:none">
            <option value="Matematica">Matemática</option>
            <option value="Portugues">Português</option>
            <option value="Programação">Programação</option>
            <option value="Aplicações para internet">Aplicações para internet</option>
          </select>
        </td>
        <td><textarea disabled class="form-control" name="a"><?= $p["A"] ?></textarea></td>
        <td><textarea disabled class="form-control" name="b"><?= $p["B"] ?></textarea></td>
        <td><textarea disabled class="form-control" name="c"><?= $p["C"] ?></textarea></td>
        <td><textarea disabled class="form-control" name="d"><?= $p["D"] ?></textarea></td>
        <td colspan="2">
          <span><?= chr($p["AlternativaCorreta"]+64) ?></span>
          <select name="correta" class="form-select mt-2" style="display:none">
            <option value="1">Alternativa A</option>
            <option value="2">Alternativa B</option>
            <option value="3">Alternativa C</option>
            <option value="4">Alternativa D</option>
          </select>
        </td>
        <td>
          <button type="button" class="btn btn-outline-primary btn-sm mb-1" onClick="editarQuestoes(<?=$p["Id"]?>)">Editar</button>
          <input style="display:none" class="btn btn-success btn-sm" name="btnUpdate" type="submit" value="Update">
        </td>
        <td><button type="button" class="btn btn-outline-danger btn-sm mb-1" onClick="deletarQuestao(<?=$p["Id"]?>)">Deletar</button></td>
      </tr>
      </form>
      <?php } ?>
      <!-- Linha para inserir nova questão -->
      <form method="POST" action="/API-Provas/?param=questoes/inserir">
      <tr class="table-form-row">
        <td></td>
        <td><textarea class="form-control" name="enunciado"></textarea></td>
        <td>
          <select name="materia" class="form-select">
            <option value="Matematica">Matemática</option>
            <option value="Portugues">Português</option>
            <option value="Programação">Programação</option>
            <option value="Aplicações para internet">Aplicações para internet</option>
          </select>
        </td>
        <td><input class="form-control" type="text" name="a"></td>
        <td><input class="form-control" type="text" name="b"></td>
        <td><input class="form-control" type="text" name="c"></td>
        <td><input class="form-control" type="text" name="d"></td>
        <td colspan="2">
          <select name="correta" class="form-select">
            <option value="1">Alternativa A</option>
            <option value="2">Alternativa B</option>
            <option value="3">Alternativa C</option>
            <option value="4">Alternativa D</option>
          </select>
        </td>
        <td colspan="2"><input type="submit" class="btn btn-primary" style="width: 100%" value="Enviar"></td>
      </tr>
      </form>
    </tbody>
  </table>
  <form method="POST" action="/API-Provas/?param=questoes/gerarProva" class="row g-3">
    <div class="col-md-4">
      <label class="form-label">Matéria:
        <select name="materia" class="form-select">
          <option value="Matematica">Matemática</option>
          <option value="Portugues">Português</option>
          <option value="Programação">Programação</option>
          <option value="Aplicações para internet">Aplicações para internet</option>
          <option value="Geral">Geral</option>
        </select>
      </label>
    </div>
    <div class="col-md-4">
      <label class="form-label">Número de questões:
        <input type="number" name="questoes" class="form-control" min="1">
      </label>
    </div>
    <div class="col-md-4 d-flex align-items-end">
      <input type="submit" class="btn btn-success w-100" value="Gerar Prova" />
    </div>
  </form>
</div>
<!-- Scripts Bootstrap e JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function editarQuestoes(id) {
    const linha = document.getElementById(id);
    const inputs = linha.querySelectorAll('input:disabled, textarea:disabled');
    inputs.forEach(el => { el.disabled = false; });
    const select = linha.querySelector('select');
    if (select) { select.style.display = 'inline'; }
    const alternativaTexto = select?.previousSibling;
    if (alternativaTexto && alternativaTexto.nodeType === Node.TEXT_NODE) {
      alternativaTexto.textContent = '';
    }
    const btnUpdate = linha.querySelector('input[name="btnUpdate"]');
    if (btnUpdate) { btnUpdate.style.display = 'inline'; }
    const btnEditar = linha.querySelector('button[onclick^="editarQuestoes"]');
    if (btnEditar) { btnEditar.style.display = 'none'; }
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
</body>
</html>