<?php
function descontoProduto($cor, $preco)
{
    if (($cor == 'AZUL' || $cor == 'VERMELHO') && $preco <= 50) {
        $desconto = ($preco - ($preco * 0.2));
    } elseif ($cor == 'AMARELO') {
        $desconto = ($preco - ($preco * 0.1));
    } elseif ($cor == 'VERMELHO' && $preco > 50) {
        $desconto = ($preco - ($preco * 0.1));
    } else {
        $desconto = $preco;
    }
    return $desconto;
}

function formatarPreco($preco){
    return number_format($preco,2,",",".");
}