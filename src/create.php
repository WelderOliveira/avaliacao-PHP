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
?>
<div class="container">
    <h1>Cadastrar Produtos</h1>
    <!--    <form name="create" method="POST" action="store.php">-->

    <!-- Text input -->
    <div class="form-outline mb-4">
        <input type="text" id="produto" name="produto" class="form-control" required/>
        <label class="form-label" for="produto">Produto</label>
    </div>

    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" class="form-control" data-affixes-stay="true" data-prefix="R$ " id="preco" name="preco" data-thousands="."
                       data-decimal="," required/>
                <label class="form-label" for="preco">Preço</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <select name="cor" id="cor" class="form-control" required>
                    <option selected>Escolha a Cor</option>
                    <option value="AMARELO">AMARELO</option>
                    <option value="AZUL">AZUL</option>
                    <option value="VERMELHO">VERMELHO</option>
                </select>
                <label for="cor">COR</label>

            </div>
        </div>
    </div>

    <!-- Submit button -->
    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block mb-4">CADASTRAR PRODUTO</button>
    <!--    </form>-->
</div>

</body>
<script src="js/jquery.maskMoney.min.js"></script>
<script src="js/create.js"></script>
</html>