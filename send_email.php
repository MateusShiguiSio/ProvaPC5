<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Validação básica
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "seuemail@exemplo.com"; // Substitua pelo seu e-mail
        $subject = "Contato do site";
        $body = "Nome: $nome\nE-mail: $email\nMensagem:\n$mensagem";
        $headers = "From: $email";

        // Tenta enviar o e-mail
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Falha ao enviar a mensagem. Tente novamente.";
        }
    } else {
        echo "E-mail inválido.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
