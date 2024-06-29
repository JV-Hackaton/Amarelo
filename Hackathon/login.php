<?php
include('auxiliar/conectabd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usnm = $_POST['usernm'];
    $pw = $_POST['pw'];

    // Obtém o "tempero" associado ao usnm do usuário da tabela tb_usuarios
    // $sql = "SELECT i_pw_usuario FROM tb_usuario WHERE s_usnm_usuario = '$usnm'";
    // $result = mysqli_query($link, $sql);
    // while($tbl = mysqli_fetch_array($result)){
        // $tempero = $tbl[0];
    // }

    // Consulta SQL para verificar se existe um usuário com o usnm e pw fornecidos
    $sql = "SELECT COUNT(*) FROM tb_usuario
            WHERE s_usnm_usuario = '$usnm' AND
            i_pw_usuario= '$pw'";
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        $count = $tbl[0];
    }

    // Se houver correspondência para o usnm e pw fornecidos, recupera informações do usuário e armazena em variáveis de sessão
    $sql = "SELECT i_cod_usuario, s_usnm_usuario, i_nivel_usuario
            FROM tb_usuario WHERE s_usnm_usuario = '$usnm' AND
            i_pw_usuario= '$pw'";
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        session_start();
        $_SESSION['id'] = $tbl[0];
        $_SESSION['usnm'] = $tbl[1];
        $_SESSION['nivel'] = $tbl[3];
    }
    
    // Redireciona o usuário para a página inicial após o login bem-sucedido
    header("Location:principal.php");
    exit();
}
?>
 
 <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
   body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #111;
    overflow: hidden;
}

.container {
    position: relative;
    z-index: 1;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    max-width: 400px;
    width: 100%;
    text-align: center;
    animation: fadeIn 1s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

h1 {
    color: #fff;
    font-size: 36px;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

label {
    display: block;
    margin-bottom: 20px;
    color: #ddd;
    font-size: 20px;
    text-align: left;
}

input[type="text"],
input[type="password"] {
    width: calc(100% - 40px);
    padding: 12px;
    margin: 10px 0;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 18px;
    box-sizing: border-box;
    outline: none;
    transition: border-color 0.3s;
    background-color: #333;
    color: #fff;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #ff5f6d;
}

.button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

input[type="submit"],
input[type="button"] {
    background-color: #555; /* Cor de fundo do botão */
    color: #fff;
    padding: 14px 40px;
    border: none;
    border-radius: 25px;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    text-transform: uppercase;
}

input[type="submit"]:hover,
input[type="button"]:hover {
    background-color: #333; /* Cor mais escura para hover */
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label for="usnm">Nome:</label>
            <input type="text" name="usernm" id="usnm" maxlength="60" required placeholder="Digite seu nome">
 
            <label for="pw">Senha:</label>
            <input type="password" name="pw" id="pw" required placeholder="Digite sua senha">
 
            <div class="button-container">
                <input type="submit" value="Entrar">
                <a href="cadastro.php"><input type="button" value="Cadastrar"></a>
            </div>
        </form>
        
        <?php
        // verifica se há um parâmetro chamado 'msg' passado via URL usando o método GET
        if (isset($_GET['msg'])) {
            $mensagem = $_GET['msg'];
            echo ("<p class='msg'>$mensagem</p>");
            if($mensagem == "Dados incorretos"){
                echo("<p class='msg'><a href='recupera.php'>Esqueceu a senha?</a></p>");
            }
        }
        ?>
    </div>
    <!-- Rotating Elements -->
    <div class="rotating-element" style="top: 10%; left: 10%;"></div>
    <div class="rotating-element" style="top: 70%; left: 30%;"></div>
    <div class="rotating-element" style="top: 50%; left: 70%;"></div>
    <div class="rotating-element" style="top: 30%; left: 50%;"></div>
    <div class="rotating-element" style="top: 90%; left: 90%;"></div>
</body>
</html>