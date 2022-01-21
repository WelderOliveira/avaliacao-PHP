<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once('bootstrap/header.php')
    ?>
    <title>Cadastrar</title>
</head>
<body>
<?php
if (isset($_GET['status'])) {
    echo '<p> DEU RUIM </p>';
}
include_once('connect.php');
$id = $_GET['id'];
$sql = "select id_preco, id_produto, nm_produto, cor_produto, preco 
        from titan.tb_produtos 
        join titan.tb_preco on fk_preco = id_preco 
        where id_produto = $id";
$searche = mysqli_query($conn, $sql);

while ($array = mysqli_fetch_array($searche)) {
    $id_produto = $array['id_produto'];
    $id_preco = $array['id_preco'];
    $nm_produto = $array['nm_produto'];
    $cor_produto = $array['cor_produto'];
    $preco = $array['preco'];
}
?>

<div class="container">
    <h1>Cadastrar Produtos</h1>
    <form name="edit" method="POST" action="update.php">

        <!-- Text input -->
        <div class="form-outline mb-4">
            <input type="hidden" name="id_produto" id="id_produto" value="<?php echo $id_produto ?>">
            <input type="text" id="produto" name="produto" value="<?php echo $nm_produto ?>" class="form-control"/>
            <label class="form-label" for="produto">Produto</label>
        </div>

        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <input type="hidden" name="id_preco" id="id_preco" value="<?php echo $id_preco ?>">
                    <input type="text" class="form-control" data-affixes-stay="true" data-prefix="R$ " id="preco"
                           name="preco" value="<?php echo number_format($preco, 2, ",", "."); ?>" data-thousands="."
                           data-decimal="," required/>
                    <label class="form-label" for="preco">Preço</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="cor" name="cor" value="<?php echo $cor_produto ?>" class="form-control"
                           disabled/>
                    <label class="form-label" for="cor">COR</label>
                </div>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block mb-4">CADASTRAR PRODUTO</button>
    </form>
</div>

</body>
<script src="js/jquery.maskMoney.min.js"></script>
<script src="js/edit.js"></script>
</html>