<?php
include 'conexao.php';

if($_POST){

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$local = $_POST['local_evento'];
$data = $_POST['data_evento'];

$imagem = "";

if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] != ""){

$nomeImagem = time() . "_" . $_FILES['imagem']['name'];

$destino = "uploads/" . $nomeImagem;

move_uploaded_file($_FILES['imagem']['tmp_name'], $destino);

$imagem = $nomeImagem;

}

$insert = $conn->query("INSERT INTO eventos (nome,descricao,local_evento,data_evento,imagem)
VALUES ('$nome','$descricao','$local','$data','$imagem')");

if(!$insert){
    die("Erro ao salvar: " . $conn->error);
}

header("Location: index.php");
exit();


}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Criar Evento</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<nav>
  <div><strong>Mapa Cultural</strong></div>
  <div>
    <a href="index.php">Início</a>
  </div>
</nav>

<div class="container">
  <h1>Criar Evento</h1>

  <form method="POST" enctype="multipart/form-data">
  <input type="file" name="imagem" accept="image/*">
<input type="text" name="nome" placeholder="Nome do evento" required>

<textarea name="descricao" placeholder="Descrição do evento" required></textarea>

<input type="text" name="local_evento" placeholder="Local do evento" required>

<input type="date" name="data_evento" required>

<label>Imagem do evento</label>
<input type="file" name="imagem">

<button type="submit">Salvar Evento</button>

</form>
</div>

</body>
</html>