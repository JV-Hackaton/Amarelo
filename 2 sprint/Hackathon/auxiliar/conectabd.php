<?php
// Definição das informações de conexão com o banco de dados
$servidor = 'localhost'; // Endereço do servidor MySQL
$user = 'user_projeto'; // Nome de usuário para acesso ao banco de dados
$pass = '123456'; // Senha associada ao usuário
$banco = 'vendas'; // Nome do banco de dados

// Estabelecimento da conexão com o banco de dados
$link = mysqli_connect($servidor, $user, $pass, $banco);