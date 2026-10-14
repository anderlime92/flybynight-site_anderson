<?php
require_once "../src/loja_crud.php";
require_once "../src/produto_crud.php";
require_once "../src/loja_produto_crud.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $loja_id    = (int) $_POST["loja_id"];
    $produto_id = (int) $_POST["produto_id"];
    $estoque    = (int) $_POST["estoque"];

    inserirLojaProduto($conexao, $loja_id, $produto_id, $estoque);

    header("Location: listar.php");
    exit;
}

$lojas    = buscarLojas($conexao);     // ajuste ao nome real da função
$produtos = buscarProdutos($conexao);  // ajuste ao nome real da função
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar produto a uma loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Adicionar produto a uma loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <form action="" method="post">

            <div>
                <label for="loja_id">Loja:</label>
                <select name="loja_id" id="loja_id" required>
                    <option value="">Selecione</option>
                    <?php foreach ($lojas as $loja): ?>
                        <option value="<?= $loja["id"] ?>"><?= htmlspecialchars($loja["nome"]) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="produto_id">Produto:</label>
                <select name="produto_id" id="produto_id" required>
                    <option value="">Selecione</option>
                    <?php foreach ($produtos as $produto): ?>
                        <option value="<?= $produto["id"] ?>"><?= htmlspecialchars($produto["nome"]) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="estoque">Estoque:</label>
                <input type="number" name="estoque" id="estoque" min="0" step="1" required>
            </div>
            <button type="submit">Salvar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>