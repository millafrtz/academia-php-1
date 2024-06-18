<?php
include 'SistemaAcademia.php';


$nomeServer = "localhost";
$nomeUsuario = "root";
$senha = "";
$nomeBancoDados = "academia";

$conexao = new mysqli($nomeServer, $nomeUsuario, $senha, $nomeBancoDados);


if ($conexao->error) {
    die("Falha na conexão: " . $conexao->error);
}

$academia = new SistemaAcademia();

if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $id = $_POST['id'];
    $academia->adicionarInstrutor(new Instrutor($nome, $id));

 
    $stmt = $conexao->prepare("INSERT INTO instrutores (id, nome) VALUES (?, ?)");
    $stmt->bind_param("is", $id, $nome);

    if ($stmt->execute()) {
        echo "<p>Instrutor adicionado com sucesso!</p>";
    } else {
        echo "<p>Erro ao adicionar instrutor: " . $stmt->error . "</p>";
    }

    $stmt->close();
}


$instrutores = [];
$result = $conexao->query("SELECT nome FROM instrutores");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $instrutores[] = $row['nome'];
    }
}

$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Instrutores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Sistema de Academia</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="alunos.php">Alunos</a></li>
                    <li><a href="treinos.php">Treinos</a></li>
                    <li><a href="equipamentos.php">Equipamentos</a></li>
                    <li><a href="instrutores.php">Instrutores</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="content">
            <h2>Gerenciar Instrutores</h2>
            <form action="instrutores.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome do Instrutor:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="id">ID do Instrutor:</label>
                    <input type="number" id="id" name="id" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="adicionar">Adicionar Instrutor</button>
                </div>
            </form>
            <?php
            echo "<h3>Lista de Instrutores</h3>";
            if (!empty($instrutores)) {
                echo "<ul>";
                foreach ($instrutores as $instrutor) {
                    echo "<li>" . htmlspecialchars($instrutor) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenhum instrutor cadastrado.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>