<?php
include('backand\protect.php');
include('backand\conexao.php');

if (!isset($_SESSION)) {
  session_start();
}



if (isset($_POST['nomemarca']) || isset($_POST['formula']) || isset($_POST['validade'])) {
  
  $nomemarca = filter_input(INPUT_POST, 'nomemarca', FILTER_SANITIZE_SPECIAL_CHARS);
  $formula = filter_input(INPUT_POST, 'formula', FILTER_SANITIZE_SPECIAL_CHARS);
  $validade = filter_input(INPUT_POST, 'validade', FILTER_SANITIZE_SPECIAL_CHARS);
  $lote = filter_input(INPUT_POST, 'lote', FILTER_SANITIZE_SPECIAL_CHARS);
  $id = $_SESSION['idusuario'];
  
  $cadastrar = mysqli_query($mysqli, "INSERT INTO remedios (nomemarca, formula, validade, lote, usuario_idusuario) 
  VALUES ('$nomemarca','$formula','$validade', '$lote', '$id')");

  if ($cadastrar == true) {
    echo  "<script>alert('Cadatrado com Sucesso!');</script>";
    $script = '<script language="javascript">location.href="home.php";</script>';
    echo $script;
  } else {
    echo "<script>
      alert('Usuario não registrado');
      </script>";
    header("Location: home.php");
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Curso Libras</title>
  <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<header>
  <div class="nav-header">
    <div>
      <nav>
        <a href="home.php">Home</a>
      </nav>
    </div>
  </div>
  <div class="profile-nav nav-header">
    <nav>
      <a href="profile.php">Meu Perfil</a>
      <a href="./backand/logout.php">Sair</a>
    </nav>
  </div>
</header>

<body>
  <main>
    <form action=""  method="post">
      <label for=""> Nome da Marca</label>
      <input type="text" name="nomemarca" id="" placeholder="DELL" />

      <label for="formula">Formula</label>
      <input type="text" name="formula" id="" placeholder="H1>85">

      <label for="validade">Validade</label>
      <input type="text" name="validade" id="" placeholder="15/10/2025">

      <label for="lote">Lote</label>
      <input type="text" name="lote" id="" placeholder="865">

      <button type="submit" class="button-entrar">Cadastra</button>
    </form>
  </main>


</body>

</html>