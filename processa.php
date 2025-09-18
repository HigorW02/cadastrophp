<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa  = trim($_POST['placa'] ?? '');
    $modelo = trim($_POST['modelo'] ?? '');
    $marca  = trim($_POST['marca'] ?? '');
    $ano    = trim($_POST['ano'] ?? '');

    if ($placa === "" || $modelo === "" || $marca === "" || $ano === "") {
        echo "<span style='color:red;'>Preencha todos os campos!</span>";
        exit;
    }

    try {
        // Conexão com PostgreSQL
        $pdo = new PDO("pgsql:host=localhost;port=5432;dbname=teste", "postgres", "1809");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Inserir no banco
        $stmt = $pdo->prepare("INSERT INTO carros (placa, modelo, marca, ano) 
                               VALUES (:placa, :modelo, :marca, :ano)");
        $stmt->execute([
            ':placa'  => $placa,
            ':modelo' => $modelo,
            ':marca'  => $marca,
            ':ano'    => $ano
        ]);

        echo "<span style='color:green;'>Carro $modelo ($placa) cadastrado com sucesso!</span>";
    } catch (PDOException $e) {
        echo "<span style='color:red;'>Erro: " . $e->getMessage() . "</span>";
    }
} else {
    echo "<span style='color:red;'>Requisição inválida.</span>";
}
