<?php
include_once 'connect.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados)) {
    $sqlPreco = "INSERT INTO tb_preco (preco) VALUES (" . $dados['preco'] . ")";
    mysqli_query($conn, $sqlPreco);
    $idPreco = mysqli_insert_id($conn);
    $sqlProduto = "INSERT INTO tb_produtos (nm_produto, cor_produto, fk_preco) VALUES ('" . $dados['produto'] . "', '" . $dados['cor'] . "'," . $idPreco . ")";
    $result = mysqli_query($conn,$sqlProduto);
}
