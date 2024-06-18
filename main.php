<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Academia</title>
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
            <h2>Bem-vindo ao Sistema de Academia</h2>
            <p>Utilize o menu acima para gerenciar o sistema.</p>
        </div>
    </div>
</body>
</html>
