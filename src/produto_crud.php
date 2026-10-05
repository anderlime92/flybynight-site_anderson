<?php
// src/produto_crud.php

require_once "conecta.php";

function buscarProdutos(PDO $conexao):array 
{
    $sql = "SELECT id, nome, preco, quantidade, fornecedor_id FROM PRODUTOS";
    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
}
