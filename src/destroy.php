<?php
include_once ('connect.php');

$id_produto = $_GET['id_produto'];
$id_preco = $_GET['id_preco'];

$sqlProduto = "DELETE FROM tb_produtos WHERE id_produto=$id_produto";
$sqlPreco = "DELETE FROM tb_preco WHERE id_preco=$id_preco";

$result = mysqli_query($conn,$sqlProduto);
$result = mysqli_query($conn,$sqlPreco);

if ($result){
    header("Location: ../index.php?status=success");
}else{
    header("Location: ../index.php?status=error");
}