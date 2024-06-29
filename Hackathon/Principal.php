<?php
include('cabecalho.php');
include('auxiliar/conectabd.php');
        // Seleciona todos os campos de tb_mangas.
//$sql = "SELECT * , tb_mangas.s_sinopse_manga
//        FROM tb_mangas
//        WHERE s_sinopse_manga = i_id_manga";
//$result = mysqli_query($link, $sql);
//$sql = "SELECT * , tb_tipos.s_nm_tipo, tb_categorias.s_nm_categoria
///FROM tb_mangas, tb_tipos, tb_categorias
//WHERE s_tipo_manga = i_id_tipo AND i_id_categoria = s_categoria_manga";
//        // Define a condição de junção entre as tabelas, onde o valor do campo s_categoria_manga na tabela tb_mangas é igual ao valor do campo i_id_categoria na tabela tb_categorias.
//$response = mysqli_query($link, $sql);
?>
 
<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Space</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif; /* Define a fonte do texto */
            background-color: #111; /* Define a cor de fundo */
            color: #fff; /* Define a cor do texto */
            margin: 0; /* Remove as margens padrão */
            padding: 0; /* Remove o preenchimento padrão */
        }
 
        h2::after {
            top: -8px;
            left: -8px;
        }
 
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        input[type="submit"] {
            position: absolute;

            background-color: white;
            color: black;
            padding: 14px 100px;
            border: none;
            border-radius: 25px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-transform: uppercase;
        }
 
        input[type="submit"]:hover {
            background-color: black;
            color: white
        }
    </style>
</head>
 
<body>
<div class="container">
        <form action="produtos.php" method="POST">
            <input type="submit" value="PRODUTOS">
        </form>
    </div>
</body>
 
</html>
 
<!-- <script>
    // Função para filtrar mangás com base na entrada do usuário
    document.getElementById('searchInput').addEventListener('input', function() {
        const query = this.value.trim().toLowerCase();
        const products = document.querySelectorAll('.product-card');
 
        products.forEach(product => {
            const name = product.getAttribute('data-name').toLowerCase();
            const genre = product.getAttribute('data-genre').toLowerCase();
            if (name.includes(query) || genre.includes(query)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });
</script> -->