<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once('src/bootstrap/header.php')
    ?>
    <title>Document</title>
</head>
<body>
<div class="container">
    <?php include_once('src/navbar/navbar.php') ?>
    <div class="py-12 mt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço Original</th>
                            <th>Preço Com Desconto</th>
                            <th>COR</th>
                            <th>AÇÕES</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <?php
                            include_once('src/connect.php');
                            include_once('src/regras.php');
                            $sql = "SELECT id_preco, id_produto, nm_produto, cor_produto, preco FROM titan.tb_produtos JOIN titan.tb_preco ON fk_preco = id_preco ";
                            $search = mysqli_query($conn, $sql);

                            while ($array = mysqli_fetch_array($search)) {
                                $cor = $array['cor_produto'];
                                $preco = $array['preco'];
                                $produto = $array['nm_produto'];
                                $desconto = descontoProduto($cor,$preco);
                                echo '<td>'. $produto .'</td>';
                                echo '<td>R$ ' . formatarPreco($preco) . '</td >';
                                echo '<td>R$ ' . formatarPreco($desconto) . '</td >';
                                echo '<td>' . $cor . '</td>';

                                echo '<td class="d-none d-md-table-cell d-flex justify-content-center mb-2" >
                                        <div class="row">
                                            <a href = "src/edit.php?id=' . $array['id_produto'] . '"
                                               class="btn btn-outline-primary mx-2" >
                                                <i class="fas fa-user-edit" ></i ></a >
                                            <form action="src/destroy.php" name="delete" id="delete" method="GET">
                                                <input type="hidden" name="id_produto" id="id_produto" value="'.$array['id_produto'].'">
                                                <input type="hidden" name="id_preco" id="id_preco" value="'.$array['id_preco'].'">
                                                <button type = "submit" class="btn btn-outline-danger mx-2 verifica" >
                                                    <i class="far fa-trash-alt" ></i >
                                                </button>
                                            </form>
                                        </div>
                                    </td >';
                                echo '</tr>';

                            }
                            ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Produto</th>
                            <th>Preço Original</th>
                            <th>Preço Com Desconto</th>
                            <th>COR</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">

    $('#myTable').DataTable();

    $('.verifica').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: 'Você tem certeza que quer excluir esse produto?',
            text: "Se você excluir esse produto, ele não voltará ao menos que o cadastre novamente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Sim, Excluir Permanente!',
            cancelButtonText: 'Não, Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {
                    form.submit();
                }
            }
        });
    });
</script>
</html>
