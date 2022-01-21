<?php
include_once 'connect.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados)) {
    $preco = $dados['preco'];
    $id_preco = $dados['id_preco'];
    $id_produto = $dados['id_produto'];
    $produto = $dados['produto'];

    $sqlPreco = "UPDATE tb_preco SET preco=$preco WHERE id_preco = $id_preco" ;
    mysqli_query($conn, $sqlPreco);

    $sqlProduto = "UPDATE tb_produtos SET nm_produto='$produto' WHERE id_produto = $id_produto";
    $result = mysqli_query($conn,$sqlProduto);
}
if ($result){
    header("Location: ../index.php?status=success");
}else{
    header("Location: edit.php?status=error");
}