<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Usuario.php';

$usuario = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id    = $_POST['id'];
    $nome  = $_POST['nome'];
    $sexo  = $_POST['sexo'];
    $fone  = $_POST['fone'];
    $email = $_POST['email'];
    $usuario->atualizar($id, $nome, $sexo, $fone, $email);
    header('Location: portal.php');
    exit();
}

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $row = $usuario->lerPorId($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
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
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .radio-group { margin-bottom: 20px; }
        .radio-group label { display: inline; font-weight: normal; margin-left: 5px; }
        .radio-item { margin-right: 20px; display: inline-block; }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #FF9800;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover { background: #F57C00; }
        .voltar { text-align: center; margin-top: 15px; }
        a { color: #FF9800; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required>

            <label>Sexo:</label>
            <div class="radio-group">
                <span class="radio-item">
                    <input type="radio" id="masculino_editar" name="sexo" value="M"
                        <?php echo ($row['sexo'] === 'M') ? 'checked' : ''; ?> required>
                    <label for="masculino_editar">Masculino</label>
                </span>
                <span class="radio-item">
                    <input type="radio" id="feminino_editar" name="sexo" value="F"
                        <?php echo ($row['sexo'] === 'F') ? 'checked' : ''; ?>>
                    <label for="feminino_editar">Feminino</label>
                </span>
            </div>

            <label for="fone">Fone:</label>
            <input type="text" name="fone" id="fone" value="<?php echo htmlspecialchars($row['fone']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

            <input type="submit" value="Atualizar">
        </form>
        <div class="voltar"><a href="portal.php">← Voltar ao Portal</a></div>
    </div>
</body>
</html>
