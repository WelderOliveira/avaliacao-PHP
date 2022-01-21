$(document).ready(function ($) {
    $('#preco').maskMoney();

    $("#submit").click(function () {
        // var formData = new FormData();
        let preco = $('#preco').val();

        preco = preco.replace(".", "");
        preco = preco.replace(",", ".");
        preco = preco.replace("R$", "");

        $.ajax({
            method: "POST",
            url: "update.php",
            data: { produto: $('#produto').val(), preco: preco, id_preco:$('#id_preco').val(), id_produto:$('#id_produto').val() },
            success: function (response) {
                alert('Boa');
                window.location.href = '../index.php';
            },
            error: function (response) {
                var errors = response.responseJSON;
                console.log(errors.errors);

                errorsHtml = '';
                $.each(errors.errors, function (k, v) {
                    errorsHtml += v + '\n';
                });
                errorsHtml += '';

                alert(
                    errorsHtml
                )

            }
        });
    });

})