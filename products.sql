-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Février 2019 à 16:46
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `products`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` bigint(11) NOT NULL,
  `titre` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `titre`, `description`) VALUES
(1, 'Homme', 'vêtements pour hommes'),
(2, 'Femme', 'Vêtements pour femmes'),
(3, 'Enfant', 'Vêtements pour enfants'),
(4, 'Accessoires', 'tous les accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) NOT NULL,
  `titre` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `imgBack` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `enstock` int(11) NOT NULL,
  `id_categorie` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `description`, `img`, `imgBack`, `prix`, `enstock`, `id_categorie`) VALUES
(1, 'react Tshirt', 'description de react tshirt', 'reactjs.jpg', 'reactBack.jpg', 25.2, 5, 1),
(2, 'Node js ', 'Tshirt pour les passionné de node js', 'nodejs.jpg', 'nodeBack.jpg', 25.5, 7, 1),
(3, 'git Tshirt', 'Tshirt git pour la communauté open source', 'git.jpg', 'gitBack.jpg', 26, 10, 1),
(4, 'Html t-shirt', 'T-shirt html noir', 'html.jpg', 'htmlBack.jpg', 28.5, 8, 1),
(5, 'Angular t-shirt', 'Tshirt Angular en noir', 'angular.jpg', 'angularBack.jpg', 23.9, 5, 1),
(6, 'T-shirt Css', 'T-shirt Css en rose pour femme', 'cssWomen.jpg', 'cssWomenBack.jpg', 19.9, 12, 2),
(7, 'T-shirt style', 't-shirt feuille de style de css pour femme', 'styleWomen.jpg', 'styleWomenBack.jpg', 18.9, 13, 2),
(8, 'T-shirt html', 'T-shirt html5 our femme en blanc', 'htmlWomen.jpg', 'htmlWomenBack.jpg', 20.7, 7, 2),
(9, 'T-shirt javascript', 't-shirt javascript pour femme', 'jsWomen.jpg', 'jsWomenBack.jpg', 22.5, 10, 2),
(10, 'T-shirt node js', 'T-shirt node js en rose pour femme ', 'nodeWomen.jpg', 'nodeWomenBack.jpg', 18.5, 9, 2),
(11, 'T-shirt python', 'T-shirt python en noir pour femme', 'pythonWomen.jpg', 'pythonWomenBack.jpg', 17, 5, 2),
(12, 'T-shirt css', 'T-shirt css en vert pour homme', 'css.jpg', 'cssBack.jpg', 23.5, 10, 1),
(13, 'T-shirt js', 'T-shirt javascript en noir pour homme', 'js.jpg', 'jsBack.jpg', 20, 10, 1),
(14, 'T-shirt python', 'T-shirt python en noir pour homme', 'python.jpg', 'pythonBack.jpg', 22.5, 5, 1),
(15, 'T-shirt MySql', 'T-shirt MySql en blanc pour homme', 'mysql.jpg', 'mysqlBack.jpg', 19.9, 10, 1),
(16, 'T-shirt php', 'T-shirt php en noir pour homme', 'php.jpg', 'phpBack.jpg', 19.5, 10, 1),
(17, 'T-shirt Node js', 'T-shirt Node Js pour enfant', 'nodeEnfant.jpg', 'nodeEnfantBack.jpg', 14.5, 10, 3),
(18, 'T-shirt CSS', 'T-shirt CSS en noir pour Enfant', 'cssEnfant.jpg', 'cssEnfantBack.jpg', 12.5, 9, 3),
(19, 'T-shirt Js', 'T-shirt javascript pour enfant', 'jsEnfant.jpg', 'jsEnfantBack.jpg', 15.5, 10, 3),
(20, 'Mug js', 'Mug javascript en noir', 'mugJs.jpg', 'mugJsBack.jpg', 7.5, 12, 4),
(21, 'Coussin js', 'Coussin javascript pour voiture ou maison', 'coussinJs.jpg', 'coussinJsBack.jpg', 8.5, 7, 4),
(22, 'Caba html css', 'Caba noir en html et css', 'cssBag.jpg', 'cssBagBack.jpg', 6.5, 6, 4),
(23, 'Chaussettes Python', 'Chaussettes Python en gris', 'pythonChaussettes.jpg', 'pythonChaussettesBack.jpg', 5.5, 16, 4),
(24, 'Caba html', 'Caba html en blanc', 'htmlBag.jpg', 'htmlBagBack.jpg', 6.5, 5, 4),
(25, 'Coque html css js', 'Coque Html Css Javascript en bleu', 'htmlCoque.jpg', 'htmlCoqueBack.jpg', 9.9, 10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `adresse` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `mdp`, `adresse`) VALUES
(1, 'ts', 't', 'tttt', 'ohoho'),
(2, 'fdfd', 'farah_94460@hotmail.com', '', '36 RUE LEON BLUM'),
(3, 'fff', 'ffffgfgfg', 'fgfg', 'gfg'),
(4, 'rereer', 'efefef@efef', 'eee', 'eee'),
(5, 'zzz', 'zzz', 'zzz', 'zzz'),
(6, 'mohammed', 'mohammed_ettahiri@hotmail.fr', 'aaaa', '36 rue leon blum'),
(7, 'rereer', 'efefef@efeffff', 'erer', 'eerer'),
(8, 'reer', 'zzeezr', 'zerzerzer', 'ezrzerzer'),
(9, 'aaaa', 'aaaa@aaa', '$2y$10$BBihi7u4HgfYe9Y/IbwWw.keo7i31JW7vlPPwJHsennPw/qiJulhm', 'zaea eaze a'),
(10, 'ezrzr', 'zzzzz', '$2y$10$4apWMP6Unw3//J6osutURukEludBgQ9CvWqmfGfOCS5F6WxaCZ9Fm', 'reerer'),
(11, 'aaaa', 'aaaa@aaa2m5', '$2y$10$ymbhhpFx4611NzloU0/ckO0bfIy995ZSJsXr4D76arim1nLDDxpja', 'lllll'),
(12, 'aaaa', 'aaaa@aaa2m', '$2y$10$MOyZ2cJfIc2CQ13ziPxXPuLo6OQxJVSQE5ecgkJxbyhOSjCcXPXde', '36 rue leon blum'),
(13, '555', 'aaaa@aaa2mee', '$2y$10$TOY0JOj3NPtns06NMLstr.RL.A9c9nZTTvgNtzFXCUdm8pbsZR6tC', 'eeee'),
(14, 'mohammed ettahiri', 'bakebab3@gmail.com', '$2y$10$xJ.4e6hqIt7eCSnU0rkhiOHQlNGREDnlYZZIe7R1l0zEqKzehEObm', 'aaaa'),
(15, 'admin', 'admin@admin', '$2y$10$jXjL9FamlsOsUkFNT1l/zuCl2y1epEJvO91L6JDGK8RqDXOoPFxiK', 'admin'),
(16, 'fa', 'fa@fa.fr', '$2y$10$udv804Y6ogMgdPOkBescJe2Ax9l6xYeQlAwzcqEgsy1uxURTwagjq', '36 rue leon blum');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
