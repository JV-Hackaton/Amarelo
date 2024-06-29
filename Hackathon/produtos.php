<?php
    include('cabecalho.php');
    include('auxiliar/conectabd.php');
            // Seleciona todos os campos de tb_mangas.
    // $sql = "SELECT * , tb_mangas.s_sinopse_manga
    //         FROM tb_mangas
    //         WHERE s_sinopse_manga = i_id_manga";
    // $result = mysqli_query($link, $sql);
    // $sql = "SELECT * , tb_tipos.s_nm_tipo, tb_generos.s_nm_genero
    // FROM tb_mangas, tb_tipos, tb_generos
    // WHERE s_tipo_manga = i_id_tipo AND i_id_genero = s_genero_manga";
            // Define a condição de junção entre as tabelas, onde o valor do campo s_genero_manga na tabela tb_mangas é igual ao valor do campo i_id_genero na tabela tb_generos.
    // $response = mysqli_query($link, $sql);
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
    
            h2 {
                max-width: 1200px; /* Define a largura máxima */
                text-align: center; /* Alinha o texto ao centro */
                color: white; /* Define a cor do texto */
                margin-bottom: 20px; /* Define a margem inferior */
                position: relative; /* Define a posição relativa */
                padding: 10px; /* Define o preenchimento */
                background: linear-gradient(to right, #FFA500, #FF69B4); /* Define um fundo com gradiente laranja para rosa, é o fundo da tela*/
                border-radius: 10px; /* Define o raio da borda */
            }
    
            h2::before,
            h2::after {
                content: '';
                position: absolute;
                height: 100%;
                width: 100%;
                border: 2px solid #FFA500;
                /* Borda laranja */
                border-radius: 10px;
                top: -6px;
                left: -6px;
                z-index: -1; /* Define a ordem de sobreposição */
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
    
            .product-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                grid-gap: 20px;
                justify-items: center;
            }
    
            .product-card {
                background-color: #222;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
                transition: transform 0.3s ease-in-out;
                display: flex;
                flex-direction: column;
                align-items: center;
                height: 100%;
            }
    
            .product-card:hover {
                transform: translateY(-5px);
            }
    
            .product-img {
                text-align: center;
                width: 100%;
                position: relative;
                overflow: hidden;
                border-radius: 8px 8px 0 0;
            }
    
            .product-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-bottom: 1px solid #444;
                transition: transform 0.3s ease-in-out;
            }
    
            .product-img img:hover {
                transform: scale(1.1);
            }
    
            .product-details {
                padding: 20px;
                text-align: center;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
    
            .product-title {
                font-size: 24px;
                margin-bottom: 0px;
                color: #FFA500;
                text-transform: uppercase;
                display: block;
                height: 90px;
            }
    
            .product-price {
                font-size: 18px;
                font-weight: bold;
                color: #4CAF50;
                margin-bottom: 10px;
            }
    
            .btn-import {
                background-color: #FFA500;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;           
            }
    
            .btn-import:hover {
                background-color: #FF8C00;
            }
    
            .footer {
                background-color: #222;
                padding: 20px 0;
                color: #fff;
                text-align: center;
            }
    
            .footer h3 {
                margin-bottom: 10px;
                color: #FFA500;
            }
    
            .footer h4 {
                margin-bottom: 5px;
            }
    
            .social-icons a {
                color: #fff;
                font-size: 20px;
                margin: 0 5px;
                transition: color 0.3s;
            }
    
            .social-icons a:hover {
                color: #FFA500;
            }

            .tipomanga{
                border: solid orange thin;
                border-radius: 10px;
                padding: 10px 0;
                margin-bottom: 0px;
            }
        </style>
    </head>
    
    <body>
    
        <div class="container">
            <h2>Produtos em Destaque</h2>
            <!-- Barra de pesquisa -->
            <input type="text" id="searchInput" placeholder="Buscar mangá..." style="margin-bottom: 20px; width: 100%; padding: 10px; font-size: 16px; border-radius: 5px;">
            <form action="manga.php" method="post">
                <div class="product-grid">
                    <?php
                    include('auxiliar/conectabd.php');
                    while ($tbl = mysqli_fetch_array($response)) {
                    $sql2 = "SELECT  tb_categoria.s_nm_categoria
                    FROM  tb_categoria
                    WHERE i_cod_categoria = $tbl[4]";   
                    $response2 = mysqli_query($link, $sql2);
                    }
                    while ($tbl2 = mysqli_fetch_array($response2)) {
                        $genero = $tbl2[0];
                    }
                    $response = mysqli_query($link, $sql);
                    while ($tbl = mysqli_fetch_array($response)) {
                    ?>
                        <div class="product-card" data-name="<?= $tbl[1] ?>" data-genre="<?= $genero ?>">
                        
                            <form action="produto.php" method="post">
                                <!-- <div class="product-img">
                                    <img src="imagens/<?= $tbl[8] ?>" alt="<?= $tbl[1] ?>">
                                    <input type="hidden" value="<?= $tbl[0] ?>" name="id">
                                </div> -->
                                <div class="product-details">
                                    <h3 class="product-title"><?= $tbl[1] ?></h3>
                                    <!-- <p class="tipomanga"><strong>Tipo: </strong><?=$tbl[14]?></p> -->
                                    <p><strong>Categoria: </strong><?=$tbl[1]?></p>
                                    <button class="btn-import">Importar</button>
                                </div>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        
    </body>
    
    </html>
    
    <script>
        // Função para filtrar mangás com base na entrada do usuário
        document.getElementById('searchInput').addEventListener('input', function() {
            const query = this.value.trim().toLowerCase();
            const products = document.querySelectorAll('.product-card');
    
            products.forEach(product => {
                const name = product.getAttribute('data-name').toLowerCase();
                const cat = product.getAttribute('data-cat').toLowerCase();
                if (name.includes(query) || genre.includes(query)) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    </script>