<?php
include('auxiliar/conectabd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Obtém o "tempero" associado ao email do usuário da tabela tb_usuarios
    $sql = "SELECT s_tempero_usuario FROM tb_usuario WHERE s_email_usuario = '$email'";
    $result = mysqli_query($link, $sql);
    while($tbl = mysqli_fetch_array($result)){
        $tempero = $tbl[0];
    }

    // Calcula o hash da senha fornecida pelo usuário concatenando-a com o "tempero"
    $senha = md5($senha . $tempero);

    // Consulta SQL para verificar se existe um usuário com o email e senha fornecidos
    $sql = "SELECT COUNT(*) FROM tb_usuario
            WHERE s_email_usuario = '$email' AND
            s_senha_usuario = '$senha'";
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        $count = $tbl[0];
    }

    // Se não houver correspondência para o email e senha fornecidos, redireciona para a página de login com mensagem de erro
    if ($count == 0) {
        header("Location:login.php?msg=Dados incorretos");
        exit();
    }

    // Se houver correspondência para o email e senha fornecidos, recupera informações do usuário e armazena em variáveis de sessão
    $sql = "SELECT i_id_usuario, s_nm_usuario, i_nivel_usuario
            FROM tb_usuario WHERE s_email_usuario = '$email' AND
            s_senha_usuario = '$senha'";
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        session_start();
        $_SESSION['id'] = $tbl[0];
        $_SESSION['nome'] = $tbl[1];
        $_SESSION['nivel'] = $tbl[2];
    }
    
    // Redireciona o usuário para a página inicial após o login bem-sucedido
    header("Location:index.php");
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
 
        input[type="email"],
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
 
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #ff5f6d;
        }
 
        input[type="submit"] {
            background-color: #ff5f6d;
            color: #fff;
            padding: 14px 40px;
            border: none;
            border-radius: 25px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-transform: uppercase;
        }
 
        input[type="submit"]:hover {
            background-color: #ff3c4a;
        }
 
        .msg {
            color: #ff5f6d;
            font-weight: bold;
            margin-top: 20px;
            font-size: 18px;
        }
 
        .msg a {
            color: #ff5f6d;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
            font-size: 18px;
        }
 
        .rotating-element {
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: rotateElement 10s linear infinite alternate;
        }
 
        @keyframes rotateElement {
            from {
                transform: rotate(0deg) translateY(-100vh) scale(0.5);
                opacity: 0;
            }
            to {
                transform: rotate(360deg) translateY(100vh) scale(2);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo de volta!</h1>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" maxlength="60" required placeholder="Digite seu email">
 
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required placeholder="Digite sua senha">
 
            <input type="submit" value="Entrar">
            
        </form>
        <br>
        <a href="cadastro.php"><input type="submit" value="Cadastrar"></a>
        <?php
        // verifica se há um parâmetro chamado 'msg' passado via URL usando o método GET
        if (isset($_GET['msg'])) {
            $mensagem = $_GET['msg'];
            echo ("<p class='msg'>$mensagem</p>");
            if($mensagem == "Dados incorretos"){
                echo("<p class='msg'><a href='recupera.php'>Esqueceu a senha?</a>");
            }
        }
        ?>
    </div>
    <!-- Rotating Elements -->
    <div class="rotating-element" style="top: 10%; left: 10%;"></div>
    // está posicionado 10% para baixo e 10% para a direita de seu contêiner pai, e sua classe pode definir comportamentos adicionais de estilo, como rotação ou animação.
    <div class="rotating-element" style="top: 70%; left: 30%;"></div>
    <div class="rotating-element" style="top: 50%; left: 70%;"></div>
    <div class="rotating-element" style="top: 30%; left: 50%;"></div>
    <div class="rotating-element" style="top: 90%; left: 90%;"></div>
</body>
</html>