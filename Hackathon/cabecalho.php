<?php
// Verifica se uma sessão já foi iniciada. Se não, inicia uma nova sessão.
if(session_id() === "") session_start();

// Define a variável de sessão $_SESSION['produtos_carrinho'] como 0
//$_SESSION['produtos_carrinho'] = 0;

// Inclui o arquivo de conexão com o banco de dados
include('auxiliar/conectabd.php');

// Verifica se a variável de sessão $_SESSION['carrinho'] está definida
//if(isset($_SESSION['carrinho'])){
    // Consulta no banco de dados para contar o número de produtos no carrinho
   // $sql2 = "SELECT COUNT(*) FROM tb_carrinho
   //          WHERE s_cod_carrinho ='{$_SESSION['carrinho']}'";
   // $result2 = mysqli_query($link, $sql2);

    // Processa o resultado da consulta
    //while($tbl2 = mysqli_fetch_array($result2)){
        // Atualiza a variável de sessão $_SESSION['produtos_carrinho'] com o número de produtos no carrinho
    //    $_SESSION['produtos_carrinho'] = $tbl2[0];
//    }
//}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body>
 
<?php
// Verifica se a sessão está definida e se o nível é 10
if (isset($_SESSION['nivel']) && $_SESSION["nivel"] == 10) {
?>
    <div id="welcome-container" class="cart-container">
        <button onclick="window.location.href='principal.php'">Página Inicial</button>
        <button onclick="window.location.href='listausuarios.php'">Lista Usuários</button>
        <button onclick="window.location.href='cadastrausuario.php'">Novo Usuário</button>
        <button onclick="window.location.href='listamangas.php'">Lista Mangás</button>
        <button onclick="window.location.href='cadastramanga.php'">Novo Mangá</button>
        <button onclick="window.location.href='genero.php'">Gênero</button>
        <button onclick="window.location.href='tipo.php'">Tipo</button>
        <a href="logout.php" class="sair"><button>Sair <i class="fa fa-sign-out"></i></button></a>
        <span class="usuario"><tr ><?= $_SESSION['nome'] ?></tr></span>
        <a href="carrinho.php" class="cart"><i class="fa fa-shopping-cart"></i><?=$_SESSION['produtos_carrinho']?></a>
        
    </div>
<?php
}
 
// Verifica se a sessão está definida e se o nível é 1
if (isset($_SESSION['nivel']) && $_SESSION["nivel"] == 1) {
?>
    <div id="welcome-container" class="cart-container">
        <button onclick="window.location.href='principal.php'">Página Inicial</button>
        <button onclick="window.location.href='listausuarios.php'">Lista Usuários</button>
        <button onclick="window.location.href='listamangas.php'">Lista Mangá</button>
        <a href="logout.php" class="sair"><button>Sair <i class="fa fa-sign-out"></i></button></a>
        <span class="usuario"><tr ><?= $_SESSION['username'] ?></tr></span>
        <a href="carrinho.php" class="cart"><i class="fa fa-shopping-cart"></i><?=$_SESSION['produtos_carrinho']?></a>
    </div>
<?php
}
 
// Se o nível não estiver definido na sessão
if (!isset($_SESSION['nivel'])) {
?>
    <div id="welcome-container">
        <a href="login.php" class="login"><i class="fa fa-user" style="font-size:20px"> </i> Entrar</a>
        <button onclick="window.location.href='principal.php'">Página Inicial</button>
    </div>
<?php
}
?>

</body>
</html>