
-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(5) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom`, `prenom`, `email`, `pseudo`, `adresse`, `cp`, `ville`, `photo`, `mdp`) VALUES
(21, 'Wayne', 'Bruce', 'batman@gmail.com', 'Batman', '2 rue de la monnaie', 89200, 'Gotham', 'http://localhost/nettefliquse/photo/1666510220183551ae75280-screenshotUrl.jpg', '$2y$10$ihhuimAUbGKbakoUKzYJXeHASJHftyECOmgXnwRct3b0Ej6WpXDGi'),
(22, 'Dubus', 'Romain', 'romaindubus86@gmail.com', 'Cooltor', '19 rue des domeliers', 60200, 'Compiegne', 'http://localhost/nettefliquse/photo/1666510321182d04ccb549-screenshotUrl.jpg', '$2y$10$71rvZaNKjIbR2K66vihZ2eer.qs6vhi2RmHGtcdz9l8bGWIkLOyx2'),
(30, 'Stark', 'Tony', 'ironman@gmail.com', 'Ironman', '2 rue du flouz', 98999, 'New York', 'http://localhost/nettefliquse/photo/1666532143wp6085917-ps4-anime-street-wallpapers.jpg', '$2y$10$PIe462OElBc80zeynw2td.lflNLjYia4E27.4cRZu16seOgy2hmGi'),
(31, 'Dubus', 'Romain', 'romaindubus86@gmail.com', 'Bat', '19 rue des domeliers', 60200, 'Compiegne', 'http://localhost/nettefliquse/photo/1666532623loqsr951b.png', '$2y$10$2LB9HlwW/TcT0B5syGntTe06A92R/Vh00jQndY.3RKzfuebWWdhTS'),
(32, 'Dubus', 'Romain', 'romaindubus86@gmail.com', 'Bateau', '19 rue des domeliers', 60200, 'Compiegne', 'http://localhost/nettefliquse/photo/16665326964tae8rtqm.png', '$2y$10$dG3b1aRNa0guRFvBDpVheeaQy..QRLfoB1AjqAgoXi1LLESrrbWr2');
