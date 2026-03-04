<?php
include 'conexao.php';
$id = $_GET['id'];

$evento = $conn->query("SELECT nome FROM eventos WHERE id=$id")->fetch_assoc();
$insc = $conn->query("SELECT * FROM inscricoes WHERE evento_id=$id ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Inscritos</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<nav>
  <div><strong>Mapa Cultural Afro</strong></div>
  <div>
    <a href="index.php">Início</a>
  </div>
</nav>

<div class="container">
  <h1>Inscritos - <?php echo $evento['nome']; ?></h1>

  <?php while($p = $insc->fetch_assoc()){ ?>
    <div class="card">
      <p><strong><?php echo $p['nome_participante']; ?></strong></p>
      <p><?php echo $p['email_participante']; ?></p>
      <p><?php echo $p['data_inscricao']; ?></p>
    </div>
  <?php } ?>
</div>

</body>
</html>