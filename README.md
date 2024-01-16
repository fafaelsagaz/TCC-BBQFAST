banco de dados

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Dez-2023 às 01:18
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bbqfast`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacaos`
--

CREATE TABLE `avaliacaos` (
  `id` int(11) NOT NULL,
  `CD_PRESTADOR` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacaos`
--

INSERT INTO `avaliacaos` (`id`, `CD_PRESTADOR`, `user_id`, `comentario`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'aaaaaaaaaaaaaaaaa', '2023-11-28 01:00:24', '2023-11-28 01:00:24'),
(3, 18, 1, 'Otimo tabalho parabens as carnes estavam show', '2023-11-28 09:58:04', '2023-11-28 09:58:04'),
(4, 18, 1, 'parabens', '2023-11-28 09:59:45', '2023-11-28 09:59:45'),
(5, 18, 1, 'uiui', '2023-11-28 10:00:11', '2023-11-28 10:00:11'),
(6, 1, 3, 'Ótimo profissional e atencioso.', '2023-12-03 15:33:30', '2023-12-03 15:33:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `CD_CLIENTE` bigint(11) NOT NULL,
  `DT_NASCIMENTO_CLIENTE` date DEFAULT NULL,
  `CD_CPF_CLIENTE` char(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`CD_CLIENTE`, `DT_NASCIMENTO_CLIENTE`, `CD_CPF_CLIENTE`, `created_at`, `updated_at`) VALUES
(1, '2001-08-25', '14569878541', '2023-12-03 04:07:29', '2023-12-03 04:07:29'),
(3, '1995-09-25', '47039875896', '2023-10-29 03:46:21', '2023-10-29 03:46:21'),
(4, '1995-09-25', '47039875896', '2023-10-29 05:48:46', '2023-10-29 05:48:46'),
(13, '1994-09-25', '47032545878', '2023-11-20 18:26:18', '2023-11-20 18:26:18'),
(16, '1995-05-21', '14568975896', '2023-11-21 02:01:20', '2023-11-21 02:04:05'),
(17, '1996-09-15', '14598745896', '2023-12-03 00:35:42', '2023-12-03 00:35:42'),
(18, '1994-04-15', '14562358945', '2023-12-03 01:08:23', '2023-12-03 01:08:23'),
(20, '1988-09-15', '12547896547', '2023-12-03 02:04:22', '2023-12-03 02:04:22'),
(21, '1991-05-18', '14589632587', '2023-12-03 05:15:02', '2023-12-03 05:15:02'),
(22, '2000-09-15', '14569874591', '2023-12-03 05:16:30', '2023-12-03 05:16:30'),
(23, '1992-01-15', '12547896214', '2023-12-03 05:21:18', '2023-12-03 05:21:18'),
(24, '2001-09-15', '14569823514', '2023-12-03 18:19:35', '2023-12-03 18:19:35'),
(25, '1994-05-14', '14587452691', '2023-12-07 23:57:51', '2023-12-07 23:57:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `CD_CONTATO` int(11) NOT NULL,
  `CD_TELEFONE` char(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `FK_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_eventos`
--

CREATE TABLE `endereco_eventos` (
  `CD_ENDERECO_CLIENTE` int(11) NOT NULL,
  `CD_CEP_CLIENTE` char(8) DEFAULT NULL,
  `CD_NUMERO_ENDERECO` int(11) NOT NULL,
  `NM_CIDADE_CLIENTE` varchar(30) DEFAULT NULL,
  `SG_ESTADO_CLIENTE` char(2) DEFAULT NULL,
  `FK_CD_ENDERECO_EVENTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `CD_PEDIDO` int(11) NOT NULL,
  `DT_PEDIDO` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DS_EVENTO` varchar(30) NOT NULL,
  `DS_QUANTIDADE_EVENTO` varchar(30) NOT NULL,
  `DT_EVENTO` date NOT NULL,
  `HR_EVENTO` time NOT NULL,
  `CD_TELEFONE_EVENTO` varchar(12) NOT NULL,
  `DS_SERVICO` varchar(30) DEFAULT NULL,
  `NM_STATUS` varchar(20) NOT NULL DEFAULT 'Pendente',
  `NM_ENDERECO_EVENTO` varchar(60) NOT NULL,
  `HR_DURACAO` varchar(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  `services_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`CD_PEDIDO`, `DT_PEDIDO`, `DS_EVENTO`, `DS_QUANTIDADE_EVENTO`, `DT_EVENTO`, `HR_EVENTO`, `CD_TELEFONE_EVENTO`, `DS_SERVICO`, `NM_STATUS`, `NM_ENDERECO_EVENTO`, `HR_DURACAO`, `updated_at`, `created_at`, `user_id`, `services_id`) VALUES
(8, '2023-11-17 16:37:59', 'Formatura', '70 a 90 pessoas', '2023-11-24', '01:09:00', '13991853839', 'Churrasqueiro Individual', 'aceito', 'Av.quitino bocaiuva 543', '3 horas', '2023-11-17 19:37:59', '2023-11-01 07:06:06', 6, 0),
(9, '2023-11-17 16:41:00', 'Casamento', 'até 30 pessoas', '2023-11-22', '17:19:00', '123123123', 'Churrasqueiro Individual', 'aceito', 'AV.cuiaba', '3 horas', '2023-11-17 19:41:00', '2023-11-17 19:15:45', 5, 0),
(10, '2023-11-17 17:08:40', 'Casamento', '30 a 50 pessoas', '2023-12-07', '17:46:00', '1313131232', 'Churrasqueiro Individual', 'aceito', 'av.qdadad', '2 horas', '2023-11-17 20:08:40', '2023-11-17 19:42:43', 6, 0),
(11, '2023-11-17 17:14:09', 'Corporativo', '30 a 50 pessoas', '2023-11-28', '18:16:00', '134232342', 'Churrasqueiro Individual', 'aceito', 'av.pao', '2 horas', '2023-11-17 20:14:09', '2023-11-17 20:13:09', 6, 0),
(12, '2023-11-17 17:23:37', 'Aniversário', 'até 30 pessoas', '2023-11-30', '18:26:00', '133123123', 'Churrasqueiro Individual', 'aceito', 'av.hahaha', '3 horas', '2023-11-17 20:23:37', '2023-11-17 20:22:58', 5, 0),
(13, '2023-11-17 17:31:29', 'Casamento', 'até 30 pessoas', '2023-12-06', '18:29:00', '1231312332', 'Churrasqueiro Individual', 'aceito', 'av.dsadsa', '2 horas', '2023-11-17 20:31:29', '2023-11-17 20:25:52', 6, 0),
(14, '2023-11-17 18:02:42', 'Aniversário', '30 a 50 pessoas', '2023-11-16', '18:05:00', '13991853839', 'Churrasqueiro com Apoio', 'Pendente', 'Av.quitino bocaiuva 543', '2 horas', '2023-11-17 21:02:42', '2023-11-17 21:02:42', 6, 0),
(22, '2023-11-25 13:26:47', 'Debutante', '30 a 50 pessoas', '2023-11-23', '13:00:00', '1332132123', NULL, 'aceito', 'av.pao', '2 horas', '2023-11-25 16:26:47', '2023-11-25 15:56:53', 1, NULL),
(23, '2023-11-25 13:26:52', 'Debutante', '50 a 70 pessoas', '2023-11-11', '11:08:00', '1332132123', NULL, 'aceito', 'av.pao', '3 horas', '2023-11-25 16:26:52', '2023-11-25 16:09:07', 1, 3),
(24, '2023-11-25 13:26:56', 'Aniversário', '30 a 50 pessoas', '2023-11-20', '11:10:00', '1332132123', NULL, 'aceito', 'av.pao', '2 horas', '2023-11-25 16:26:56', '2023-11-25 16:10:01', 1, 1),
(25, '2023-11-26 17:48:20', 'Aniversário', 'até 30 pessoas', '2023-11-06', '12:01:00', '1332132123', NULL, 'aceito', 'av.pao', '3 horas', '2023-11-26 20:48:20', '2023-11-25 17:00:41', 2, 1),
(26, '2023-11-25 14:41:27', 'Formatura', '50 a 70 pessoas', '2023-11-20', '13:43:00', '1332132123', NULL, 'Pendente', 'av.pao', '2 horas', '2023-11-25 17:41:27', '2023-11-25 17:41:27', 2, 3),
(27, '2023-11-26 16:26:19', 'Formatura', '50 a 70 pessoas', '2023-12-15', '14:00:00', '14974556236', NULL, 'Pendente', 'Av. Ana Costa, 211, Encruzilhada, Santos', '2 horas', '2023-11-26 19:26:19', '2023-11-26 19:26:19', 3, 4),
(28, '2023-12-03 04:52:51', 'Corporativo', '50 a 70 pessoas', '2023-12-12', '14:00:00', '13988556633', NULL, 'Pendente', 'Av. Ana Costa, 211, Encruzilhada, Santos', '3 horas', '2023-12-03 04:52:51', '2023-12-03 04:52:51', 18, 4),
(29, '2023-12-03 05:15:29', 'Coquetel', 'até 30 pessoas', '2023-12-14', '17:00:00', '19987452631', NULL, 'aceito', 'Av. Ana Costa, 211, Encruzilhada, Santos', '2 horas', '2023-12-03 05:15:29', '2023-12-03 05:06:31', 3, 1),
(30, '2023-12-11 23:09:21', 'Aniversário', 'até 30 pessoas', '2023-12-13', '14:00:00', '1395588574', NULL, 'Pendente', 'Av.Aragão 432', '1 hora', '2023-12-11 23:09:21', '2023-12-11 23:09:21', 15, 1),
(31, '2023-12-11 23:10:38', 'Corporativo', '1', '2023-11-16', '20:00:00', '14988552211', NULL, 'Pendente', 'Rua almeida 32', '2 horas', '2023-12-11 23:10:38', '2023-12-11 23:10:38', 17, 1),
(32, '2023-12-11 23:12:43', 'Batizado', 'até 30 pessoas', '2023-09-13', '17:34:00', '1398157878', NULL, 'Pendente', 'Avenida Japao 893', '1 hora', '2023-12-11 23:12:43', '2023-12-11 23:12:43', 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_fisica`
--

CREATE TABLE `pessoa_fisica` (
  `CD_PESSOA_FISICA` bigint(11) NOT NULL,
  `CD_CPF` char(11) DEFAULT NULL,
  `FK_CD_PRESTADOR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_juridica`
--

CREATE TABLE `pessoa_juridica` (
  `CD_PESSOA_JURIDICA` bigint(11) NOT NULL,
  `CD_CNPJ` char(14) DEFAULT NULL,
  `DS_DESCRICAO` text DEFAULT NULL,
  `FK_CD_PRESTADOR` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id`, `nome`, `descricao`) VALUES
(1, 'Grill', 'Plano Básico'),
(2, 'BBQ', 'Plano Premium');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestadores`
--

CREATE TABLE `prestadores` (
  `CD_PRESTADOR` bigint(11) NOT NULL,
  `CD_CNPJ` bigint(20) DEFAULT NULL,
  `DS_DESCRICAO` text DEFAULT NULL,
  `services_id` bigint(11) DEFAULT NULL,
  `specialties_id` bigint(20) DEFAULT NULL,
  `planos_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `prestadores`
--

INSERT INTO `prestadores` (`CD_PRESTADOR`, `CD_CNPJ`, `DS_DESCRICAO`, `services_id`, `specialties_id`, `planos_id`, `created_at`, `updated_at`) VALUES
(1, 14587425698423, 'Teste de producão', 1, 1, NULL, '2023-12-03 05:05:01', '2023-12-03 05:05:01'),
(3, 14789654128457, 'Eu sou ótimo com carne', 1, 2, 2, '2023-10-30 04:42:12', '2023-12-11 23:19:53'),
(9, 12345678912, 'Sou profissional', 3, 1, NULL, '2023-12-11 22:59:12', '2023-12-11 22:59:12'),
(12, 69696969696969, 'Santos', 2, 2, NULL, '2023-11-19 21:19:13', '2023-11-20 05:05:40'),
(13, 12356984592145, 'churrasqueiro', 3, 1, NULL, '2023-12-03 04:49:48', '2023-12-03 04:49:48'),
(16, 14785236589421, 'Sou bbq fast', 2, 2, NULL, '2023-11-21 02:12:02', '2023-11-21 02:12:02'),
(17, 47851258965478, 'Sou um cachorro', 2, 4, NULL, '2023-11-22 01:34:21', '2023-11-22 01:34:21'),
(18, 41258965487425, 'Mais de 20 anos de experiencia', 1, 4, 2, '2023-11-22 02:30:32', '2023-11-27 03:47:40'),
(20, 14587412598546, 'Churrasco Premium para a familia', 2, 2, NULL, '2023-12-03 02:35:26', '2023-12-03 02:35:26'),
(21, 14569874581254, 'Teste', 3, 3, NULL, '2023-12-03 05:11:13', '2023-12-03 05:11:13'),
(22, 14569874523698, 'Teste 2', 2, 4, NULL, '2023-12-03 05:17:31', '2023-12-03 05:17:31'),
(23, 15478965214785, 'Teste 3', 2, 1, NULL, '2023-12-03 05:20:26', '2023-12-03 05:20:26'),
(24, 14879625874236, 'Profissional com mais de 9 anos de experiência.', 2, 3, 1, '2023-12-03 18:29:58', '2023-12-03 19:18:27'),
(25, 14587412589541, 'Sou um otimo profssional', 1, 4, NULL, '2023-12-07 23:11:24', '2023-12-11 23:07:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestadores_services`
--

CREATE TABLE `prestadores_services` (
  `CD_PRESTADOR` bigint(11) NOT NULL,
  `CD_SERVICO` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestador_especializacao`
--

CREATE TABLE `prestador_especializacao` (
  `CD_PRESTADOR` bigint(20) NOT NULL,
  `CD_ESPECIALIZACAO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id` bigint(11) NOT NULL,
  `DS_SERVICO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `DS_SERVICO`) VALUES
(1, 'Churrasqueiro Indivi'),
(2, 'Churrasqueiro com Ap'),
(3, 'Buffet'),
(4, 'Todos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `specialties`
--

CREATE TABLE `specialties` (
  `id` bigint(11) NOT NULL,
  `DS_ESPECIALIZACAO` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `specialties`
--

INSERT INTO `specialties` (`id`, `DS_ESPECIALIZACAO`) VALUES
(1, 'Churrasco Tradicional'),
(2, 'Churrasco Vegetariano'),
(3, 'Churrasco na Parrilla'),
(4, 'Churrasco de Frutos do Mar'),
(5, 'Churrasco de Fogo de Chão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

CREATE TABLE `status_pedido` (
  `CD_PEDIDO_STATUS` int(11) NOT NULL,
  `IC_STATUS` int(11) DEFAULT NULL,
  `NM_STATUS` varchar(20) NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `info_incluida_cliente` bit(1) DEFAULT b'0',
  `info_incluida_prestador` bit(1) DEFAULT b'0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `telefone`, `image`, `password`, `remember_token`, `info_incluida_cliente`, `info_incluida_prestador`, `created_at`, `updated_at`) VALUES
(1, 'Rafael Durval', 'paozinho@gmail.com', NULL, '14988552145', '04970d1ad10641a93c7e78ce38749299.png', '$2y$10$68wMLwanNNBg.mOztuylQOdrDgZqoNXhI0lgDSaoAkZIKPkoR.UEO', NULL, b'1', b'1', '2023-10-25 04:22:53', '2023-12-03 05:05:01'),
(2, 'Rafael Durval', 'rafdurval1@gmail.com', NULL, NULL, '', '$2y$10$z2md1KxA0LcvUpW7wu/B3ulcfpvIEQ7ZttmKUmN8xb6v/F/cID7cS', NULL, b'0', b'0', '2023-10-26 01:13:39', '2023-10-26 01:13:39'),
(3, 'Ronaldo Santana', 'cremosinho@gmail.com', NULL, '19987452631', 'f9c930ef6309e7bbfb7cbee13d0e6378.jpg', '$2y$10$hsuobW/Eicm9jmhVw.QiEOS6GnEsGOGzfDYOR57.bGdiMhOWl5Caq', NULL, b'1', b'1', '2023-10-29 00:19:40', '2023-12-11 23:19:53'),
(4, 'Daniel', 'danielzinho@etec.sp.gov.br', NULL, '13981635916', '', '$2y$10$LfcBRCnDB8XLKiWrnwAlBOy9wL8v23j6ktRhPq7TtzJSv04CQR5DW', NULL, b'1', b'0', '2023-10-29 04:05:44', '2023-10-29 04:05:44'),
(7, 'Dihego Crecencio', 'teste145@gmail.com', NULL, NULL, '', '$2y$10$r3FrC1sTuiR1ULE98O6SY.G0uNshho/u3fs777X9QTlmJWB.FLbLq', NULL, b'0', b'0', '2023-11-05 23:45:13', '2023-11-05 23:45:13'),
(8, 'Roberto Saude', 'saude123@gmail.com', NULL, '13981452145', '', '$2y$10$VE4mTyDIYlPxgJf5HrHhne2DfL9Z9RerRnh1NTNpUEyjmtVu597/2', NULL, b'0', b'0', '2023-11-05 23:49:01', '2023-11-05 23:49:01'),
(9, 'Cleiton Silva', 'cleitin123@hotmail.com', NULL, '13974156898', '05e2d103fc063b131310eb11a0869e59.jpg', '$2y$10$oS5gS9TKtrDjWyJAY5VVXeRthseBKLC4sgTJeWl1nQAB/lCJGLEEK', NULL, b'0', b'1', '2023-11-06 00:01:08', '2023-12-11 23:00:32'),
(10, 'Rivaldo Junior', 'saul@gmail.com', NULL, '1398157878', '', '$2y$10$jw3LtIWFX/1/4exjKjKlbOe5hwv7Jx/R//xljs4uwxD9ocm1aGxM2', NULL, b'0', b'0', '2023-11-12 05:22:31', '2023-11-12 05:22:31'),
(11, 'Sandro Matos', 'sandrinho@gmail.com', NULL, NULL, '', '$2y$10$BfjQK4nX6/deHCZnsb26yO6vMDGHXhJFCk5wQvZ/oTBb1lgDaxjsi', NULL, b'0', b'0', '2023-11-15 05:54:50', '2023-11-15 05:54:50'),
(12, 'Sempre Santos', 'Naa@htomail.com', NULL, '13984758547', '', '$2y$10$NWAuMO9438oYsgcM75.kN.T/CO0PdKhmvWEGJEphEHZcuQQfj8RYy', NULL, b'0', b'1', '2023-11-19 21:18:02', '2023-11-20 05:13:59'),
(13, 'Davi Duarte', 'samir@hotmail.com', NULL, '13988557744', '', '$2y$10$pOD.vvLHitJ0ZrSIs74h8O681/ROHfhAeZ4Klzdsv0iZ68iuUdceu', NULL, b'1', b'1', '2023-11-20 17:36:50', '2023-12-03 04:49:48'),
(14, 'Samara Luis', 'samara@hotmail.com', NULL, '14988776633', '0cc79f1c925b81c83695118d05254607.png', '$2y$10$SOvucwiPBRRYmdHLDovCZ.JoIta0akqOnxV59nJ/vZjNeq1Ioya.2', NULL, b'0', b'0', '2023-11-20 21:30:11', '2023-11-20 21:30:11'),
(15, 'Daniel Silva', 'silva@hotmail.com', NULL, NULL, 'c761ccef8014264c16e7ad2807629f03.png', '$2y$10$InyH4SaH.mZOIESy/xv96eaGfL/1hyVTtdHdIzoaE4uiCzIPX.09u', NULL, b'0', b'0', '2023-11-21 01:53:56', '2023-11-21 01:53:56'),
(16, 'Wilson Araujo', 'limista@hotmail.com', NULL, '13988554477', '03e4132c408684dc82e3168717e5b1f2.png', '$2y$10$K5W./fxUKIBevwmcQDNSR.APqcaXQITsVABF5lPLdHtrzB8E9DJgi', NULL, b'1', b'1', '2023-11-21 02:00:32', '2023-11-21 02:14:50'),
(17, 'Sandro Louco', 'louco@hotmail.com', NULL, '14988552211', '359f5b2a89a5b6c707c7baced1ae5bdd.png', '$2y$10$JHrUW3H1xR9WYcXUMydYruQEoeYpX2e9spdJ.iU2tqVZg4f69yfp.', NULL, b'1', b'1', '2023-11-22 01:33:21', '2023-12-03 00:37:24'),
(18, 'Lauro do Contorno', 'vale@hotmail.com', NULL, '13988556633', '90090dd5697e75671ecd5a10375ff733.jpg', '$2y$10$bUY78bHE/EagR5GUKg9sHeLkXsWWHxj/SvTdxkDmmm4dJhSQH1REW', NULL, b'1', b'1', '2023-11-22 02:18:07', '2023-12-03 01:08:23'),
(20, 'Ramon', 'ramon@hotmail.com', NULL, '14988475216', '3ad0c866a4908d83ee6a1a483b23ace2.png', '$2y$10$3t7a8Wvd0ZxHnUzx4OLTEeZLI0QNO8gYr9U45oOMtTytr/r1C9nfe', NULL, b'1', b'1', '2023-12-03 02:03:28', '2023-12-03 02:35:26'),
(21, 'Saulo', 'saulo@gmail.com', NULL, '15987453621', NULL, '$2y$10$UVQByzUHlfXkIYEPRsHSUu9eCQrnTq8kFfAI.Nf0NCU88nU1y46lO', NULL, b'1', b'1', '2023-12-03 05:05:31', '2023-12-03 05:15:02'),
(22, 'Ricardo', 'ricardo@gmail.com', NULL, '15974562314', NULL, '$2y$10$WGBPlEHf8l3mJHD9uWPU8uqphUnQ1Sez2Godqz4PB3I1XX16nLdGC', NULL, b'1', b'1', '2023-12-03 05:15:55', '2023-12-03 05:17:31'),
(23, 'Paulo', 'paulo@gmail.com', NULL, '16985478532', NULL, '$2y$10$BRtsemvEuopN1f/UYrLCD./N4tDKGmnsbDsWyG/cprFiMfYMam4iG', NULL, b'1', b'1', '2023-12-03 05:19:45', '2023-12-03 05:21:18'),
(24, 'Salvio Santos', 'santos@gmail.com', NULL, '13988547894', '2252f228f7f2dddd40d1a8f5def671d6.png', '$2y$10$JB.0X5Kmffonz2bKiMH9ReTrV7b8oUZIJZeD4vIxEPA3UYrKvybEy', NULL, b'1', b'1', '2023-12-03 18:13:31', '2023-12-03 18:29:58'),
(25, 'Andre Silva', 'andre@hotmail.com', NULL, '13988556622', '0d995942bef11bbdd3a65eafe92cfc84.png', '$2y$10$.eY0o2bQMNQRafq/nfyB0enFtvikvmVerSF3hCcPeeGwBreF1zEU.', NULL, b'1', b'1', '2023-12-07 22:44:20', '2023-12-11 23:07:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_id_recusou`
--

CREATE TABLE `user_id_recusou` (
  `user_id` bigint(20) NOT NULL,
  `CD_PEDIDO` int(11) NOT NULL,
  `NM_STATUS` varchar(20) NOT NULL DEFAULT 'Pendente',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_id_recusou`
--

INSERT INTO `user_id_recusou` (`user_id`, `CD_PEDIDO`, `NM_STATUS`, `updated_at`, `created_at`) VALUES
(9, 33, 'Pendente', NULL, NULL),
(9, 34, 'Pendente', NULL, NULL),
(9, 35, 'Pendente', '2023-10-31 05:55:01', '2023-10-31 05:55:01'),
(10, 36, 'Pendente', '2023-10-31 06:00:20', '2023-10-31 06:00:20'),
(10, 37, 'Pendente', '2023-10-31 06:09:41', '2023-10-31 06:09:41'),
(2, 8, 'recusado', '2023-11-01 07:13:55', '2023-11-01 07:13:55'),
(3, 22, 'aceito', '2023-11-25 16:26:47', '2023-11-25 16:26:47'),
(3, 23, 'aceito', '2023-11-25 16:26:52', '2023-11-25 16:26:52'),
(3, 24, 'aceito', '2023-11-25 16:26:57', '2023-11-25 16:26:57'),
(9, 33, 'Pendente', NULL, NULL),
(9, 34, 'Pendente', NULL, NULL),
(9, 35, 'Pendente', '2023-10-31 05:55:01', '2023-10-31 05:55:01'),
(10, 36, 'Pendente', '2023-10-31 06:00:20', '2023-10-31 06:00:20'),
(10, 37, 'Pendente', '2023-10-31 06:09:41', '2023-10-31 06:09:41'),
(2, 8, 'recusado', '2023-11-01 07:13:55', '2023-11-01 07:13:55'),
(3, 22, 'aceito', '2023-11-25 16:26:47', '2023-11-25 16:26:47'),
(3, 23, 'aceito', '2023-11-25 16:26:52', '2023-11-25 16:26:52'),
(3, 24, 'aceito', '2023-11-25 16:26:57', '2023-11-25 16:26:57'),
(18, 25, 'aceito', '2023-11-26 20:48:20', '2023-11-26 20:48:20'),
(1, 29, 'aceito', '2023-12-03 05:15:29', '2023-12-03 05:15:29');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacaos`
--
ALTER TABLE `avaliacaos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CD_CLIENTE`);

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`CD_CONTATO`),
  ADD KEY `id` (`FK_id`);

--
-- Índices para tabela `endereco_eventos`
--
ALTER TABLE `endereco_eventos`
  ADD PRIMARY KEY (`CD_ENDERECO_CLIENTE`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`CD_PEDIDO`),
  ADD KEY `eventos_ibfk_6` (`user_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD PRIMARY KEY (`CD_PESSOA_FISICA`),
  ADD KEY `FK_CD_PRESTADOR` (`FK_CD_PRESTADOR`);

--
-- Índices para tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD PRIMARY KEY (`CD_PESSOA_JURIDICA`),
  ADD KEY `pessoas_juridica_fk_cd_prestador` (`FK_CD_PRESTADOR`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`CD_PRESTADOR`),
  ADD KEY `prestadores_ibfk_2` (`services_id`),
  ADD KEY `prestadores_ibfk_3` (`specialties_id`),
  ADD KEY `prestadores_ibfk_4` (`planos_id`);

--
-- Índices para tabela `prestadores_services`
--
ALTER TABLE `prestadores_services`
  ADD KEY `fk_prestador_servico` (`CD_PRESTADOR`),
  ADD KEY `fk_servico_prestador` (`CD_SERVICO`);

--
-- Índices para tabela `prestador_especializacao`
--
ALTER TABLE `prestador_especializacao`
  ADD KEY `fk_prestador_especializacao` (`CD_PRESTADOR`),
  ADD KEY `fk_especializacao_prestador` (`CD_ESPECIALIZACAO`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  ADD PRIMARY KEY (`CD_PEDIDO_STATUS`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_id_recusou`
--
ALTER TABLE `user_id_recusou`
  ADD KEY `user_id_recusou` (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacaos`
--
ALTER TABLE `avaliacaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `CD_CLIENTE` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `CD_CONTATO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco_eventos`
--
ALTER TABLE `endereco_eventos`
  MODIFY `CD_ENDERECO_CLIENTE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `CD_PEDIDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  MODIFY `CD_PESSOA_FISICA` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  MODIFY `CD_PESSOA_JURIDICA` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `prestadores`
--
ALTER TABLE `prestadores`
  MODIFY `CD_PRESTADOR` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  MODIFY `CD_PEDIDO_STATUS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`CD_CLIENTE`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `contatos_ibfk_1` FOREIGN KEY (`FK_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD CONSTRAINT `pessoas_juridica_fk_cd_prestador` FOREIGN KEY (`FK_CD_PRESTADOR`) REFERENCES `prestadores` (`CD_PRESTADOR`);

--
-- Limitadores para a tabela `prestadores`
--
ALTER TABLE `prestadores`
  ADD CONSTRAINT `prestadores_ibfk_1` FOREIGN KEY (`CD_PRESTADOR`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `prestadores_ibfk_2` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `prestadores_ibfk_3` FOREIGN KEY (`specialties_id`) REFERENCES `specialties` (`id`),
  ADD CONSTRAINT `prestadores_ibfk_4` FOREIGN KEY (`planos_id`) REFERENCES `planos` (`id`);

--
-- Limitadores para a tabela `prestadores_services`
--
ALTER TABLE `prestadores_services`
  ADD CONSTRAINT `fk_prestador_servico` FOREIGN KEY (`CD_PRESTADOR`) REFERENCES `prestadores` (`CD_PRESTADOR`),
  ADD CONSTRAINT `fk_servico_prestador` FOREIGN KEY (`CD_SERVICO`) REFERENCES `services` (`id`);

--
-- Limitadores para a tabela `prestador_especializacao`
--
ALTER TABLE `prestador_especializacao`
  ADD CONSTRAINT `fk_especializacao_prestador` FOREIGN KEY (`CD_ESPECIALIZACAO`) REFERENCES `specialties` (`id`),
  ADD CONSTRAINT `fk_prestador_especializacao` FOREIGN KEY (`CD_PRESTADOR`) REFERENCES `prestadores` (`CD_PRESTADOR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;








<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
