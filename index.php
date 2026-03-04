<?php
include 'conexao.php';

$result = $conn->query("SELECT * FROM eventos ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mapa Cultural Afro</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<nav>
  <div><strong>Mapa Cultural</strong></div>
  <div>
    <a href="index.php">Início</a>
    <a href="criar_evento.php">Criar Evento</a>
  </div>
</nav>

<div class="container">
  <h1>Eventos</h1>

  <?php while($e = $result->fetch_assoc()){ ?>
    <div class="card">
      <h2>
        <a href="evento.php?id=<?php echo $e['id']; ?>" style="color:white; text-decoration:none;">
          🎭 <?php echo $e['nome']; ?>
        </a>
      </h2>
      <p><?php echo $e['descricao']; ?></p>
      <p>📍 <?php echo $e['local_evento']; ?></p>
      <p>🗓 <?php echo $e['data_evento']; ?></p>
    </div>
  <?php } ?>

</div>
</body>
</html>