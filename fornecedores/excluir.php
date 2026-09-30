<?php
// fornecedores/excluir.php
require_once "../src/fornecedor_crud.php";
$id = $_GET['id'];
excluirFornecedor($conexao, $id);
header("local:listar.php");
exit;