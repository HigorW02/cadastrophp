// Envio do formulário via AJAX
$("#formCadastro").on("submit", function (e) {
    e.preventDefault(); // impede o reload da página

    $.ajax({
        url: "processa.php",
        type: "POST",
        data: $(this).serialize(),
        success: function (resposta) {
            $("#mensagem").html(resposta);
            $("#formCadastro")[0].reset(); // limpa o formulário
        },
        error: function () {
            $("#mensagem").html("<span style='color:red;'>Erro na requisição.</span>");
        }
    });
});
