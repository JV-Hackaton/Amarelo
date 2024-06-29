<?php
include("auxiliar/conectabd.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $pw = $_POST['password'];
    $nivel = 10;

    // Consulta para verificar se o email já está em uso
    $query = "SELECT * FROM tb_usuario WHERE s_usnm_usuario='$username'";
    $result = mysqli_query($link,$query);
        while($tbl = mysqli_fetch_array($result)){
            $count = $tbl[0];
        }
    
    if($count != 0){
        header("Location: login.php?msg=Usuário já cadastrado");
        exit();
    }
    
    // ------------------------------------------------------------------- //
 
    // este comando organiza cada um dos itens em INSERT com os itens em VALUES
    $sql = "INSERT INTO tb_usuario (s_usnm_usuario, i_pw_usuario,
    i_nivel_usuario) VALUES ('$username', '$senha', '$nivel')";
 
    mysqli_query($link, $sql);
    header("Location: listausuario.php");
    exit();
}
include('cabecalho.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
         
</head>
<body>
    <h1>Cadastro de Comprador</h1>
    <div class="container">
        <div class="w3-container form-container">
            <form action="cadastro.php" method="POST" class="w3-container">
                <label for="username">Usuário</label>
                <input type="text" name="username" id="username" maxlength="60" required>
 
                <label for="pw">Senha:</label>
                <input type="password" name="senha" id="password" required>

                <br><br>
                <input type="submit" value="Cadastrar">
    </form>
</div>
 
</body>
</html>