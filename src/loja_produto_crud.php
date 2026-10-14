<?php
require_once "conecta.php";

function buscarLojasProdutos(PDO $conexao) {
 /* $sql = "SELECT
                lojasProdutos.loja_id,
                lojasProdutos.produto_id,
                lojas_produtos.estoque,
                lojas.nome AS nome_loja,
                produtos.nome AS nome_produto
            FROM lojasProdutos
            INNER JOIN lojas ON lojasProdutos.loja_id = lojas.id
            INNER JOIN produtos ON lojasProdutos.produto_id = produtos.id"; */
    $sql = "SELECT
            lojas_produtos.loja_id,
            lojas_produtos.produto_id,
            lojas_produtos.estoque,
            lojas.nome AS nome_loja,
            produtos.nome AS nome_produto
        FROM lojas_produtos
        INNER JOIN lojas ON lojas_produtos.loja_id = lojas.id
        INNER JOIN produtos ON lojas_produtos.produto_id = produtos.id";
    $resultado = $conexao->query($sql);
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}

function inserirLojaProduto(PDO $conexao, int $loja_id, int $produto_id, int $estoque) {
    $sql = "INSERT INTO lojas_produtos (loja_id, produto_id, estoque) VALUES (:loja_id, :produto_id, :estoque)";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":loja_id", $loja_id, PDO::PARAM_INT);
    $consulta->bindValue(":produto_id", $produto_id, PDO::PARAM_INT);
    $consulta->bindValue(":estoque", $estoque, PDO::PARAM_INT);
    return $consulta->execute();
}

/* function buscarLojaProdutoPorIds(PDO $conexão): void {
    $sql = "";
} */

/* function atualizarLojaProduto(PDO $conexão): void {
    $sql = "";
} */

/* function excluirLojaProduto(PDO $conexão): void {
    $sql = "";
} */