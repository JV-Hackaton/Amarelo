-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2024 às 19:03
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `i_cod_categoria` int(11) NOT NULL,
  `s_nm_categoria` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `i_cod_cliente` int(11) NOT NULL,
  `s_nm_cliente` varchar(60) DEFAULT NULL,
  `s_email_cliente` varchar(255) DEFAULT NULL,
  `s_telefone_cliente` varchar(20) DEFAULT NULL,
  `i_cnpj_cliente` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens`
--

CREATE TABLE `tb_itens` (
  `i_cod_itens` int(11) NOT NULL,
  `i_cod_pedido` int(11) NOT NULL,
  `i_cod_produto` int(11) NOT NULL,
  `i_qtde_itens` int(11) NOT NULL,
  `d_vlrunit_itens` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `i_cod_pedido` int(11) NOT NULL,
  `i_cod_cliente` int(11) NOT NULL,
  `dt_data_pedido` date DEFAULT NULL,
  `d_tol_pedido` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `i_cod_produto` int(11) NOT NULL,
  `i_cod_categoria` int(11) NOT NULL,
  `s_nm_produto` varchar(60) DEFAULT NULL,
  `d_vlr_produto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `i_cod_usuario` int(11) NOT NULL,
  `s_usnm_usuario` varchar(60) DEFAULT NULL,
  `i_pw_usuario` int(11) NOT NULL,
  `i_nivel_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`i_cod_usuario`, `s_usnm_usuario`, `i_pw_usuario`, `i_nivel_usuario`) VALUES
(3, 'Admin', 123, 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
