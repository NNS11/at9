<?php
include_once './config/config.php';
include_once './classes/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Usuario($db);
    $nome  = $_POST['nome'];
    $sexo  = $_POST['sexo'];
    $fone  = $_POST['fone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario->criar($nome, $sexo, $fone, $email, $senha);
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - Sistema CRUD</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }
        h1 { text-align: center; color: #333; margin-bottom: 30px; font-size: 22px; }
        label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .radio-group { margin-bottom: 20px; }
        .radio-group label { display: inline; font-weight: normal; margin-left: 5px; }
        .radio-group input[type="radio"] { margin-right: 3px; }
        .radio-item { margin-right: 20px; display: inline-block; }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover { background: #1976D2; }
        p { text-align: center; margin-top: 15px; color: #555; }
        a { color: #2196F3; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adicionar Usuário</h1>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label>Sexo:</label>
            <div class="radio-group">
                <span class="radio-item">
                    <input type="radio" id="masculino" name="sexo" value="M" required>
                    <label for="masculino">Masculino</label>
                </span>
                <span class="radio-item">
                    <input type="radio" id="feminino" name="sexo" value="F">
                    <label for="feminino">Feminino</label>
                </span>
            </div>

            <label for="fone">Fone:</label>
            <input type="text" name="fone" id="fone" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <input type="submit" value="Registrar">
        </form>
        <p>Já tem conta? <a href="./index.php">Faça login</a></p>
    </div>
</body>
</html>
