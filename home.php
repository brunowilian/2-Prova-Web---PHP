<?php
include('backand\protect.php');
include('backand\conexao.php');

$iddelete;

if (!isset($_SESSION)) {
  session_start();
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<style>
  table,
  th,
  td {
    border: 1px solid black;
    width: 450px;
    height: 30px;
  }
</style>

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
    <div>

      <?php
      $sql = "SELECT idremedios, nomemarca, formula, validade, lote FROM remedios ";
      $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Formula</th><th>Validade</th><th>Lote</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["idremedios"] . "</td><td>" . $row["nomemarca"] . "</td><td>" . $row["formula"] . "</td><td>" . $row["validade"] . "</td><td>" . $row["lote"] . "</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
      $mysqli->close();

      ?>
      <div class="cadastro">
        <a href="produtocadastro.php">Cadastrar Produto</a>
        <label>Apagar Produto</label>
        <input type="number" value="$iddelete">
        <a href="./delete.php">Apagar</a>
      </div>
    </div>
  </main>
</body>

</html>