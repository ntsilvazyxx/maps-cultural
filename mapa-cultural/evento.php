<?php
include 'conexao.php';

$id = $_GET['id'];

$evento = $conn->query("SELECT * FROM eventos WHERE id=$id")->fetch_assoc();

if($_POST){
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  $conn->query("INSERT INTO inscricoes (evento_id, nome_participante, email_participante)
                VALUES ($id, '$nome', '$email')");

  header("Location: index.php?inscricao=ok");
  exit();
}

// contar inscritos
$contar = $conn->query("SELECT COUNT(*) as total FROM inscricoes WHERE evento_id=$id")->fetch_assoc();

<p>👥 Inscritos: <?php echo $dados['total']; ?></p>

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $evento['nome']; ?></title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<nav>
  <div><strong>Mapa Cultural Afro</strong></div>
  <div>
    <a href="index.php">Início</a>
    <a href="criar_evento.php">Criar Evento</a>
  </div>
</nav>

<div class="container">
  <h1><?php echo $evento['nome']; ?></h1>
  <?php if($e['imagem'] != ""){ ?>
    <img src="uploads/<?php echo $e['imagem']; ?>" 
    style="width:100%;border-radius:10px;margin-bottom:10px;">
    <?php } ?>
    <?php if(isset($_GET['inscricao'])){ ?>
<div style="background: #4caf50;padding:10px;border-radius:8px;margin-bottom:15px;">
    Inscricao realizada com sucesso!
</div>
<?php } ?>

  <div class="card">
    <?php if($e['imagem'] != ""){ ?>
    <img src="uploads/<?php echo $e['imagem']; ?>" 
    style="width:100%;border-radius:10px;margin-bottom:10px;">
    <?php } ?>
    <p><?php echo $evento['descricao']; ?></p>
    <p>📍 <?php echo $evento['local_evento']; ?></p>
    <p>🗓 <?php echo $evento['data_evento']; ?></p>
    <p>👥 Inscritos: <strong><?php echo $contar['total']; ?></strong></p>
  </div>

  <h2>Inscreva-se</h2>
  <form method="POST">
    <input type="text" name="nome" placeholder="Seu nome" required>
    <input type="email" name="email" placeholder="Seu e-mail" required>
    <button type="submit">Confirmar inscrição</button>
  </form>

  <p style="margin-top:15px;">
    <a href="inscritos.php?id=<?php echo $id; ?>" style="color:white;">Ver lista de inscritos</a>
  </p>
</div>

</body>
</html>