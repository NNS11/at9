<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$usuario = new Usuario($db);

if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $usuario->deletar($id);
    header('Location: portal.php');
    exit();
}

$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);

if (!$dados_usuario) {
    session_destroy();
    header('Location: index.php');
    exit();
}

$nome_usuario = $dados_usuario['nome'];
$dados = $usuario->ler();

function saudacao() {
    $hora = date('H');
    if ($hora >= 6 && $hora < 12) return "Bom dia";
    elseif ($hora >= 12 && $hora < 18) return "Boa tarde";
    else return "Boa noite";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal - Sistema CRUD</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f0f2f5; }
        header {
            background: #333;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 { font-size: 18px; }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-verde   { background: #4CAF50; color: white; }
        .btn-laranja { background: #FF9800; color: white; }
        .btn-vermelho{ background: #f44336; color: white; }
        .btn:hover { opacity: 0.85; }
        .main { padding: 30px; }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        th {
            background: #333;
            color: white;
            padding: 12px 15px;
            text-align: left;
        }
        td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background: #f9f9f9; }
        .td-acoes { display: flex; gap: 8px; }
    </style>
</head>
<body>
    <header>
        <h1><?php echo saudacao() . ", " . htmlspecialchars($nome_usuario); ?>! 👋</h1>
        <div>
            <a class="btn btn-verde" href="registrar.php">+ Adicionar Usuário</a>
            <a class="btn btn-vermelho" href="logout.php">Sair</a>
        </div>
    </header>

    <div class="main">
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Fone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo ($row['sexo'] === 'M') ? 'Masculino' : 'Feminino'; ?></td>
                    <td><?php echo htmlspecialchars($row['fone']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td class="td-acoes">
                        <a class="btn btn-laranja" href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a class="btn btn-vermelho" href="deletar.php?id=<?php echo $row['id']; ?>"
                           onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
