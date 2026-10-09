<?php
require_once "conecta.php";

function buscarLojasProdutos(PDO $conexão): array {
    $sql = "SELECT
                lojasProdutos.loja_id,
                lojasProdutos.produto_id,
                lojas.nome AS nome_loja,
                produtos.nome AS nome_produto
            FROM lojasProdutos
            INNER JOIN lojas ON lojasProdutos.loja_id = lojas.id
            INNER JOIN produtos ON lojasProdutos.produto_id = produtos.id";
    
}

/* function inserirLojaProduto(PDO $conexão): void {
    $sql = "";
} */

/* function buscarLojaProdutoPorIds(PDO $conexão): void {
    $sql = "";
} */

/* function atualizarLojaProduto(PDO $conexão): void {
    $sql = "";
} */

/* function excluirLojaProduto(PDO $conexão): void {
    $sql = "";
} */