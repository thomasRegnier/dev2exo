-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 18 nov. 2019 à 12:55
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogDev2`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `date`) VALUES
(7, 'Une porte dérobée découverte dans 11 bibliothèques Ruby', 'Les responsables du projet RubyGems ont supprimé 18 versions malveillantes de 11 bibliothèques Ruby contenant un mécanisme de porte dérobée. Ces bibliothèques ont été repérées en train d\'insérer du code qui lançait des opérations d\'extraction de cryptomonnaie cachées dans les projets Ruby d\'autres personnes.\r\n\r\nLe code malveillant a été découvert pour la première fois lundi dans quatre versions de rest-client, une bibliothèque Ruby extrêmement populaire.\r\n\r\nSelon une analyse de Jan Dintel, un développeur hollandais de Ruby, le code malveillant trouvé dans rest-client collecterait et enverrait l\'URL et les variables d\'environnement d\'un système compromis à un serveur distant en Ukraine.', '2019-11-14 10:13:09'),
(8, 'Google publie en open source sa bibliothèque de confidentialité différentielle', 'Que vous soyez un urbaniste, un propriétaire de petite entreprise ou un développeur de logiciels, tirer parti des données des données peut améliorer le fonctionnement de votre service et répondre à des questions importantes\", a écrit Miguel Guevara, chef de produit au bureau de la protection des données et de la confidentialité de Google. \"Mais sans protection stricte de la confidentialité, vous risquez de perdre la confiance de vos citoyens, clients et utilisateurs. L\'analyse de données utilisant la confidentialité différentielle est une approche qui permet aux organisations de tirer des enseignements de l’ensemble des données tout en veillant à ce que ces résultats ne permettent pas la distinction ou la réidentification des données d\'un individu.', '2019-11-14 10:13:38'),
(10, 'Tenetur vitae et dolore et hic.', 'Architecto quasi ut aperiam voluptate voluptatum et dolores temporibus deserunt possimus non qui reiciendis voluptatum ut.', '2019-11-14 10:42:21'),
(13, 'Eligendi harum beatae aspernatur ullam.', 'Ab fugit dolorem deserunt amet recusandae dolores ut veritatis doloribus qui tempore magnam nesciunt voluptatem omnis est nostrum dicta sed et est repudiandae est.', '2019-11-14 12:10:30'),
(14, 'title test', '<h1>Content test</h1>', '2019-11-15 08:59:47'),
(15, 'Ut quia omnis commodi iure sunt et.', 'Error eius in eligendi tempore omnis dolorem est et quidem laudantium exercitationem quod aut necessitatibus voluptas adipisci fugit aperiam molestiae omnis blanditiis id sequi nam nesciunt consequatur.', '2019-11-15 09:31:24'),
(17, 'Love**is**bold', 'Love**is**bold', '2019-11-15 18:53:39'),
(18, 'test', '# Heading level 1	', '2019-11-15 18:54:06');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
