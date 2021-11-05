-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 05 nov. 2021 à 06:47
-- Version du serveur : 8.0.26
-- Version de PHP : 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vedoko_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity_sectors`
--

CREATE TABLE `activity_sectors` (
  `sector_id` int NOT NULL,
  `sector_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `classe_id` int NOT NULL,
  `classe_name` varchar(255) NOT NULL,
  `class_code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`classe_id`, `classe_name`, `class_code`) VALUES
(1611, 'Sixième', '6eme'),
(1612, 'Cinquiéme', '5eme'),
(1613, 'Quatriéme', '4eme'),
(1614, 'Troisiéme', '3eme'),
(1615, 'Seconde', '2nde'),
(1616, 'Premiére', '1ere'),
(1617, 'Terminale', 'Tle');

-- --------------------------------------------------------

--
-- Structure de la table `forums`
--

CREATE TABLE `forums` (
  `forum_id` int NOT NULL,
  `forum_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `forum_type` enum('GROUP','GENERAL','INDIVIDUAL') DEFAULT NULL,
  `creation_date_time` varchar(45) DEFAULT NULL,
  `forum_link` varchar(255) DEFAULT NULL,
  `forum_code` varchar(105) DEFAULT NULL,
  `promotion_id` int DEFAULT NULL,
  `classe_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `forums`
--

INSERT INTO `forums` (`forum_id`, `forum_name`, `forum_type`, `creation_date_time`, `forum_link`, `forum_code`, `promotion_id`, `classe_id`) VALUES
(1611, '3eme - Prom : 2002-2003', 'GROUP', '2021-10-22 21:05:22', NULL, NULL, 1613, 1614),
(1612, '2nde - Prom : 2002-2003', 'GROUP', '2021-10-22 21:23:36', NULL, NULL, 1613, 1615),
(1617, NULL, 'INDIVIDUAL', '2021-10-25 20:51:54', 'http://127.0.0.1/vedoko/user/forum/group/home/1617', NULL, NULL, NULL),
(1618, '5eme - Prom : 2003-2004', 'GROUP', '2021-10-27 20:32:36', NULL, NULL, 1614, 1612),
(1619, NULL, 'INDIVIDUAL', '2021-10-27 20:35:50', NULL, NULL, NULL, NULL),
(1620, NULL, 'INDIVIDUAL', '2021-10-27 20:42:54', 'http://127.0.0.1/vedoko/user/forum/group/home/1620', NULL, NULL, NULL),
(1621, NULL, 'INDIVIDUAL', '2021-11-04 07:44:54', 'http://127.0.0.1/vedoko/user/forum/group/home/1621', NULL, NULL, NULL),
(1622, '2nde - Prom : 2003-2004', 'GROUP', '2021-11-04 09:51:43', NULL, NULL, 1614, 1615),
(1623, NULL, 'INDIVIDUAL', '2021-11-04 10:41:48', NULL, NULL, NULL, NULL),
(1624, NULL, 'INDIVIDUAL', '2021-11-04 10:41:48', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `forum_messages`
--

CREATE TABLE `forum_messages` (
  `message_id` int NOT NULL,
  `message_date` datetime DEFAULT NULL,
  `message` varchar(45) DEFAULT NULL,
  `send_by_user_id` int NOT NULL,
  `forum_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `forum_messages`
--

INSERT INTO `forum_messages` (`message_id`, `message_date`, `message`, `send_by_user_id`, `forum_id`) VALUES
(1609, '2021-10-24 10:50:23', 'Message', 1622, 1611),
(1610, '2021-10-24 11:13:01', 'An other one', 1622, 1611),
(1611, '2021-10-24 11:50:44', 'ok', 1622, 1611),
(1612, '2021-10-25 21:40:42', '                ok', 1623, 1617),
(1613, '2021-11-04 07:46:57', '                gftrgr', 1622, 1611),
(1614, '2021-11-04 07:47:10', '                gfdsgdf', 1622, 1611),
(1615, '2021-11-04 07:47:22', '                sdfdsfsq', 1622, 1611),
(1616, '2021-11-04 07:49:21', '                fdhgfdh', 1624, 1621),
(1617, '2021-11-04 07:49:27', '                vdxbfd', 1624, 1621);

-- --------------------------------------------------------

--
-- Structure de la table `forum_request`
--

CREATE TABLE `forum_request` (
  `request_id` int NOT NULL,
  `forum_id` int NOT NULL,
  `invited_user` int NOT NULL,
  `created_by` int NOT NULL,
  `date_create` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ;

--
-- Déchargement des données de la table `forum_request`
--

INSERT INTO `forum_request` (`request_id`, `forum_id`, `invited_user`, `created_by`, `date_create`, `active`) VALUES
(1, 1617, 1623, 1622, '2021-10-25 20:51:54', 1),
(2, 1620, 1624, 1622, '2021-10-27 20:42:54', 1),
(3, 1621, 1624, 1622, '2021-11-04 07:44:54', 1),
(4, 1623, 1625, 1622, '2021-11-04 10:41:48', 1),
(5, 1624, 1625, 1622, '2021-11-04 10:41:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `promotion_id` int NOT NULL,
  `promotion_name` varchar(255) NOT NULL,
  `classe_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`promotion_id`, `promotion_name`, `classe_id`) VALUES
(1612, '2001-2002', NULL),
(1613, '2002-2003', NULL),
(1614, '2003-2004', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profil_picture` varchar(255) DEFAULT NULL,
  `coverture_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `phone_number`, `gender`, `email`, `password`, `profil_picture`, `coverture_picture`) VALUES
(1622, 'Tyler', 'Mcknight', '+1 (553) 635-4762', 'male', 'user@user.com', '$2y$10$CKIgF6BR/DcFJeTNx2eGeOiqADzx0BuUwV8hOOrhkIuQNKpsbciJe', NULL, NULL),
(1623, 'Moana', 'Tanner', '+1 (941) 418-6154', 'female', 'toqybavoxy@mailinator.com', '$2y$10$7Q5z/TQ.FQTJMGtMEssZ4e9WaHy2iC366UGecrzndk0nAMB8np/Oi', NULL, NULL),
(1624, 'Lavinia', 'Morse', '+1 (854) 472-1705', 'male', 'vyhu@mailinator.com', '$2y$10$CjoVSz7tTiWl7Q9Ei42C1eF/e/bbf4.9gz97/HSLP6nZRWKCZzJjS', NULL, NULL),
(1625, 'Ori', 'Hicks', '+1 (368) 834-4755', 'male', 'dugeret@mailinator.com', '$2y$10$DlaNHwp3Dv93JpCli.nv7e4jjNDzpoAgZTHLcS.Zsvuc4HwFJBFOK', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_has_classes`
--

CREATE TABLE `users_has_classes` (
  `user_has_classe_id` int NOT NULL,
  `classe_name` varchar(255) NOT NULL,
  `classe_id` int NOT NULL,
  `user_id` int NOT NULL,
  `networ_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `user_forums`
--

CREATE TABLE `user_forums` (
  `forum_id` int NOT NULL,
  `creation_date_time` datetime DEFAULT NULL,
  `invited_user_id` int DEFAULT NULL,
  `created_by_user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `user_preference_id` int NOT NULL,
  `referral_id` int NOT NULL,
  `referral_link` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `father_id` int DEFAULT NULL,
  `is_job_needed` tinyint(1) DEFAULT NULL,
  `is_employee` tinyint(1) DEFAULT NULL,
  `forum_promotion_id` int DEFAULT NULL,
  `forum_general_id` int DEFAULT NULL,
  `activity_sector_id` int DEFAULT NULL,
  `promotion_id` int DEFAULT NULL,
  `classe_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `netword_order` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user_preferences`
--

INSERT INTO `user_preferences` (`user_preference_id`, `referral_id`, `referral_link`, `birth_date`, `father_id`, `is_job_needed`, `is_employee`, `forum_promotion_id`, `forum_general_id`, `activity_sector_id`, `promotion_id`, `classe_id`, `user_id`, `active`, `netword_order`) VALUES
(5, 1, 'user/subscribe/referal/1622/1486230548', NULL, NULL, NULL, NULL, 1611, NULL, NULL, 1613, 1614, 1622, 1, 1),
(6, 1622, 'user/subscribe/referal/1623/1959935097', NULL, NULL, NULL, NULL, 1612, NULL, NULL, 1613, 1615, 1623, 1, 1),
(7, 1622, 'user/subscribe/referal/1624/133234977', NULL, NULL, NULL, NULL, 1618, NULL, NULL, 1614, 1612, 1624, 1, 2),
(8, 1624, 'user/subscribe/referal/1625/1198240629', NULL, NULL, NULL, NULL, 1622, NULL, NULL, 1614, 1615, 1625, 1, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity_sectors`
--
ALTER TABLE `activity_sectors`
  ADD PRIMARY KEY (`sector_id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classe_id`);

--
-- Index pour la table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`forum_id`);

--
-- Index pour la table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `fk_forum_messages_users_idx` (`send_by_user_id`),
  ADD KEY `fk_forum_messages_forums1_idx` (`forum_id`);

--
-- Index pour la table `forum_request`
--
ALTER TABLE `forum_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `fk_forum_id` (`forum_id`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promotion_id`),
  ADD KEY `fk_promotions_classes1_idx` (`classe_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `users_has_classes`
--
ALTER TABLE `users_has_classes`
  ADD PRIMARY KEY (`user_has_classe_id`),
  ADD KEY `fk_users_has_classes_classes1_idx` (`classe_id`),
  ADD KEY `fk_users_has_classes_users1_idx` (`user_id`);

--
-- Index pour la table `user_forums`
--
ALTER TABLE `user_forums`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `fk_user_forums_users1_idx` (`created_by_user_id`),
  ADD KEY `fk_user_forums_forums1_idx` (`forum_id`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Index pour la table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`user_preference_id`),
  ADD KEY `fk_user_preferences_activities_sectors1_idx` (`activity_sector_id`),
  ADD KEY `fk_user_preferences_promotions1_idx` (`promotion_id`),
  ADD KEY `fk_user_preferences_users1_idx` (`user_id`),
  ADD KEY `classe_id` (`classe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activity_sectors`
--
ALTER TABLE `activity_sectors`
  MODIFY `sector_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1609;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `classe_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1618;

--
-- AUTO_INCREMENT pour la table `forums`
--
ALTER TABLE `forums`
  MODIFY `forum_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1625;

--
-- AUTO_INCREMENT pour la table `forum_messages`
--
ALTER TABLE `forum_messages`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1618;

--
-- AUTO_INCREMENT pour la table `forum_request`
--
ALTER TABLE `forum_request`
  MODIFY `request_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promotion_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1615;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1626;

--
-- AUTO_INCREMENT pour la table `users_has_classes`
--
ALTER TABLE `users_has_classes`
  MODIFY `user_has_classe_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1609;

--
-- AUTO_INCREMENT pour la table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `user_preference_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD CONSTRAINT `fk_forum_messages_forums1` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`forum_id`),
  ADD CONSTRAINT `fk_forum_messages_users` FOREIGN KEY (`send_by_user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `fk_promotions_classes1` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`classe_id`);

--
-- Contraintes pour la table `users_has_classes`
--
ALTER TABLE `users_has_classes`
  ADD CONSTRAINT `fk_users_has_classes_classes1` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`classe_id`),
  ADD CONSTRAINT `fk_users_has_classes_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `user_forums`
--
ALTER TABLE `user_forums`
  ADD CONSTRAINT `fk_user_forums_forums1` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`forum_id`),
  ADD CONSTRAINT `fk_user_forums_users1` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD CONSTRAINT `fk_user_preferences_activities_sectors1` FOREIGN KEY (`activity_sector_id`) REFERENCES `activity_sectors` (`sector_id`),
  ADD CONSTRAINT `fk_user_preferences_promotions1` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`promotion_id`),
  ADD CONSTRAINT `fk_user_preferences_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
