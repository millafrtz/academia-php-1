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
    if (isset($_POST['nome'], $_POST['tipo'], $_POST['descricao'])) {
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];
        $academia->adicionarTreino(new Treino($nome, $tipo, $descricao));

        $stmt = $conexao->prepare("INSERT INTO treinos (nome, tipo, descricao) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $tipo, $descricao);

        if ($stmt->execute()) {
            echo "<p>Treino adicionado com sucesso!</p>";
        } else {
            echo "<p>Erro ao adicionar treino: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Erro: Todos os campos devem ser preenchidos.</p>";
    }
}

$treinos = [];
$result = $conexao->query("SELECT nome, tipo, descricao FROM treinos");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $treinos[] = "Nome: " . htmlspecialchars($row['nome']) . " - Tipo: " . htmlspecialchars($row['tipo']) . " - Descrição: " . htmlspecialchars($row['descricao']);
    }
}

$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Treinos</title>
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
            <h2>Gerenciar Treinos</h2>
            <form action="treinos.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome do Treino:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo do Treino:</label>
                    <input type="text" id="tipo" name="tipo" maxlength="100" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Treino:</label>
                    <input type="text" id="descricao" name="descricao" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="adicionar">Adicionar Treino</button>
                </div>
            </form>
            <?php
            echo "<h3>Lista de Treinos</h3>";
            if (!empty($treinos)) {
                echo "<ul>";
                foreach ($treinos as $treino) {
                    echo "<li>" . $treino . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenhum treino cadastrado.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>