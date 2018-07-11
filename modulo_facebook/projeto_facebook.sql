-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.33-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projeto_facebook
CREATE DATABASE IF NOT EXISTS `projeto_facebook` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `projeto_facebook`;

-- Copiando estrutura para tabela projeto_facebook.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) unsigned NOT NULL,
  `titulo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projeto_facebook.grupos: ~2 rows (aproximadamente)
DELETE FROM `grupos`;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`id`, `id_usuario`, `titulo`) VALUES
	(2, 1, 'Grupo de teste'),
	(3, 3, 'Grupo da UsuÃ¡ria 3');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_facebook.grupos_membros
CREATE TABLE IF NOT EXISTS `grupos_membros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) unsigned DEFAULT NULL,
  `id_usuario` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela projeto_facebook.grupos_membros: ~4 rows (aproximadamente)
DELETE FROM `grupos_membros`;
/*!40000 ALTER TABLE `grupos_membros` DISABLE KEYS */;
INSERT INTO `grupos_membros` (`id`, `id_grupo`, `id_usuario`) VALUES
	(1, 2, 1),
	(2, 2, 2),
	(3, 2, 3),
	(4, 3, 3);
/*!40000 ALTER TABLE `grupos_membros` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_facebook.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `tipo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `texto` text CHARACTER SET latin1,
  `url` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela projeto_facebook.posts: ~7 rows (aproximadamente)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `id_usuario`, `data_criacao`, `tipo`, `texto`, `url`, `id_grupo`) VALUES
	(2, 1, '2018-07-06 15:47:59', 'foto', 'Post com imagem.', '13f504588f89526a426a8bf2d2c7c293.jpg', 0),
	(3, 2, '2018-07-06 16:09:59', 'texto', 'Post do UsuÃ¡rio 2', NULL, 0),
	(4, 3, '2018-07-06 16:11:35', 'texto', 'Post usuÃ¡rio 3', '', 0),
	(5, 1, '2018-07-06 16:26:02', 'texto', 'Post Novo UsuÃ¡rio 1', '', 0),
	(6, 2, '2018-07-06 16:26:54', 'texto', 'Post novo UsuÃ¡rio 2', '', 0),
	(7, 4, '2018-07-10 17:02:58', 'foto', 'Post U4 com foto.', 'd4354254231a5fce8962261739f5b07b.jpg', 0),
	(8, 1, '2018-07-10 17:13:49', 'texto', 'Post U1 no grupo \\\'Grupo de teste\\\'', '', 2);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_facebook.posts_comentarios
CREATE TABLE IF NOT EXISTS `posts_comentarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_post` int(11) unsigned DEFAULT NULL,
  `id_usuario` int(11) unsigned DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `texto` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela projeto_facebook.posts_comentarios: ~6 rows (aproximadamente)
DELETE FROM `posts_comentarios`;
/*!40000 ALTER TABLE `posts_comentarios` DISABLE KEYS */;
INSERT INTO `posts_comentarios` (`id`, `id_post`, `id_usuario`, `data_criacao`, `texto`) VALUES
	(2, 6, 1, '2018-07-09 15:18:58', 'Comentario U1 Post U2'),
	(3, 5, 1, '2018-07-09 17:50:47', 'ComentÃ¡rio U1 do Post U1'),
	(4, 5, 2, '2018-07-10 17:38:01', 'Comentario U2 no post U1'),
	(5, 5, 3, '2018-07-10 17:48:34', 'Comentario U3 do Post U1'),
	(6, 5, 3, '2018-07-10 17:49:09', 'Comentario 2 de U3 no post U1'),
	(7, 4, 3, '2018-07-10 17:52:17', 'Comentario U3 do Post U3'),
	(8, 3, 2, '2018-07-10 17:56:58', 'Comentario U2 do post U2');
/*!40000 ALTER TABLE `posts_comentarios` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_facebook.posts_likes
CREATE TABLE IF NOT EXISTS `posts_likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_post` int(11) unsigned DEFAULT NULL,
  `id_usuario` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela projeto_facebook.posts_likes: ~1 rows (aproximadamente)
DELETE FROM `posts_likes`;
/*!40000 ALTER TABLE `posts_likes` DISABLE KEYS */;
INSERT INTO `posts_likes` (`id`, `id_post`, `id_usuario`) VALUES
	(2, 5, 2),
	(3, 6, 2);
/*!40000 ALTER TABLE `posts_likes` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_facebook.relacionamentos
CREATE TABLE IF NOT EXISTS `relacionamentos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_de` int(11) unsigned DEFAULT '0',
  `usuario_para` int(11) unsigned DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela projeto_facebook.relacionamentos: ~7 rows (aproximadamente)
DELETE FROM `relacionamentos`;
/*!40000 ALTER TABLE `relacionamentos` DISABLE KEYS */;
INSERT INTO `relacionamentos` (`id`, `usuario_de`, `usuario_para`, `status`) VALUES
	(1, 1, 2, 1),
	(3, 3, 1, 1),
	(4, 1, 5, 1),
	(5, 5, 2, 0),
	(6, 5, 4, 1),
	(7, 1, 4, 0),
	(8, 6, 1, 0);
/*!40000 ALTER TABLE `relacionamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_facebook.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `senha` varchar(32) CHARACTER SET latin1 NOT NULL,
  `sexo` tinyint(1) DEFAULT NULL,
  `bio` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela projeto_facebook.usuarios: ~4 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `nome`, `senha`, `sexo`, `bio`) VALUES
	(1, 'u1@u.com', 'UsuÃ¡rio 1', '202cb962ac59075b964b07152d234b70', 1, 'asdfsadfasd, alterado'),
	(2, 'u2@u.com', 'UsuÃ¡rio 2', '202cb962ac59075b964b07152d234b70', 1, 'Biografia UsuÃ¡rio 2'),
	(3, 'u3@u.com', 'UsuÃ¡ria 3', '202cb962ac59075b964b07152d234b70', 0, 'Biografia UsuÃ¡ria 3'),
	(4, 'u4@u.com', 'UsuÃ¡rio 4', '202cb962ac59075b964b07152d234b70', 1, NULL),
	(5, 'u5@u.com', 'UsuÃ¡ria 5', '202cb962ac59075b964b07152d234b70', 0, NULL),
	(6, 'u6@u.com', 'Usuario 6', '202cb962ac59075b964b07152d234b70', 1, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
