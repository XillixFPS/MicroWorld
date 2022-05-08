-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2022 at 01:21 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelle`, `active`) VALUES
(1, 'PC Gamer', 1),
(2, 'Ordinateur de bureau', 1),
(3, 'PC portable', 1),
(4, 'Ecran', 1),
(5, 'Clavier', 1),
(6, 'Souris', 1),
(7, 'Casque audio', 1),
(8, 'Microphone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `idUser`, `dateCommande`) VALUES
(3, 4, '2022-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `idCommande` int(11) NOT NULL,
  `IdProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lignecommande`
--

INSERT INTO `lignecommande` (`idCommande`, `IdProduit`, `quantite`) VALUES
(3, 12, 1),
(3, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `habilitation` varchar(45) NOT NULL,
  `nomMenu` varchar(45) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `url`, `habilitation`, `nomMenu`) VALUES
(1, NULL, 'ACV', 'Ordinateurs'),
(2, NULL, 'ACV', 'Périphérique'),
(3, '', 'A', 'Admin'),
(11, 'pc-gamer.php', 'ACV', 'PC Gamer'),
(12, 'pc-portable.php', 'ACV', 'PC Portable'),
(13, 'ordinateur-de-bureau.php', 'ACV', 'Ordinateur de bureau'),
(21, 'souris.php', 'ACV', 'Souris'),
(22, 'ecran.php', 'ACV', 'Ecran'),
(23, 'clavier.php', 'ACV', 'Clavier'),
(24, 'casque-audio.php', 'ACV', 'Casque audio'),
(25, 'microphone.php', 'ACV', 'Microphone'),
(31, 'gerer-user.php', 'A', 'Gérer les Utilisateurs'),
(32, 'gerer-produit.php', 'A', 'Gérer les Produits');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idproduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(100) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `caracteristique` varchar(3000) NOT NULL,
  `quantite` int(11) NOT NULL,
  `img1` varchar(45) NOT NULL,
  `img2` varchar(45) DEFAULT NULL,
  `img3` varchar(45) DEFAULT NULL,
  `img4` varchar(45) DEFAULT NULL,
  `img5` varchar(45) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`idproduit`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idproduit`, `nomProduit`, `idCategorie`, `prix`, `description`, `caracteristique`, `quantite`, `img1`, `img2`, `img3`, `img4`, `img5`, `active`) VALUES
(2, 'Logitech G PRO Souris Gamer sans Fil, Capteur Gaming HERO', 6, 149, 'Le Capteur Gamer HERO Nouvelle Génération: la souris gamer de Logitech possède la technologie de capteur optique HERO qui offre des performances optimales et jusqu\'à 10 fois plus de puissance. Pieds PTFE : &gt; 250 kilomètres\r\nTechnologie sans Fil LIGHTSPEED: souris gamer sans fil avec technologie wireless LIGHTSPEED offre un taux de rapport USB de 1000 Hz (1ms) et une durabilité: 50 millions de clics .Accélération maximale : &gt; 40 G\r\nCapteur HERO 25K: suivi des mouvements ultra-rapides de la souris gamer Logitech à des vitesses supérieures à 400 IPS et une résolution de 100 - 25 600 PPP pour un jeu de niveau professionnel\r\nUltra-Légère: avec sa coque extérieure d\'1 mm, la souris gamer offre résistance et soutien structurel dans un format ergonomique de 80g\r\nDesign ambidextre: design polyvalente dans une forme compacte, cette souris est conçue pour le confort et la durabilité. La forme équilibrée fonctionne pour les droitiers et les gauchers\r\nSANS FIL. SANS LIMITE : le n° 1 mondial des périphériques de gaming sans fil - D\'après des données de ventes agrégées indépendantes (fév. 2019 - fév. 2020) sur le nombre d\'unités de périphériques de gaming sans fil (claviers, souris et casques PC)', 'Marque : Logitech G\r\nNuméro du modèle de l\'article : ‎910-005273\r\nséries : Pro Wireless Gaming Mouse\r\nCouleur : ‎Noir\r\nGarantie constructeur : Garantie Fabricant: 2 ans\r\nSystème d\'exploitation : ‎Chrome OS\r\nPlate-forme du matériel informatique : ‎PC, Mac\r\nType d\'alimentation : ‎Alimenté par l\'énergie solaire\r\nType de connecteur : ‎Radio-Fréquence\r\nLatéralité manuelle : ‎Ambidextre\r\nDimensions de l\'article L x L x H : 12.5 x 6.3 x 4 centimètres\r\nPoids du produit : ‎0.08 Kilogrammes\r\nDisponibilité des pièces détachées : Information indisponible sur les pièces détachées', 10, '7SrONU2T4O.jpg', 'C0P9L9wMeB.jpg', 'ird7dBV3v5.jpg', '', '', 1),
(3, 'Corsair Katar Pro XT Souris de gaming ultra-légère', 6, 70, 'Pesant seulement 73 g, le Katar Pro XT est extrêmement léger et agile pour des heures de jeu FPS ou MOBA.\r\nLa forme compacte et symétrique du Katar Pro XT le rend idéal pour les griffes et les doigts.\r\nUn capteur optique de 18 000 DPI de PixArt, personnalisable en 1 étapes, offre la précision et le suivi de haute précision dont vous avez besoin pour la victoire.\r\nLes boutons Corsair QuickStrike utilisent un design à ressort, offrant un espace zéro entre les boutons clic gauche et droit et leurs commutateurs, de sorte que vos clics, tirs et sorts sont plus rapides que jamais.\r\nUn câble paracorde léger réduit la traînée, permettant des mouvements plus rapides et plus précis de la souris.', 'Marque	‎Corsair\r\nConnexions	‎Câblé\r\nCaractéristiques spéciales	‎Légère\r\nDisponibilité des pièces détachées	‎Information indisponible sur les pièces détachées', 2, 'orAjsIaH1f.jpg', '2272smjCoe.jpg', 'rypfIPv3yP.jpg', 'xfKmCvduZy.jpg', '3lWFao6bPe.jpg', 1),
(4, 'Blue Yeti X Microphone USB', 8, 136, 'Yeti X se compose de 4 capsules pour capturer le son légendaire Blue avec un meilleur focus et clarté, pour du gaming niveau pro, Twitch streaming, podcast et vidéos YouTube\r\nLe micro Yeti X et son indicateur LED haute résolution à 11 segments permet de visualiser le niveau de votre voix et ajuster en fonction, pour un son de qualité pro devant les caméras\r\nAjustez les réglages et contrôlez le volume du casque, gain du micro, coupure de son et mixage depuis le bouton intelligent. Restez concentré sur la performance d\'enregistrement audio et streaming\r\nAméliorez la qualité son de votre streaming avec Blue VO!CE effets broadcast en téléchargeant Logitech G HUB pour un accès à des préréglages créés par des ingénieurs du son professionnels\r\nAjustez la couleur de l\'éclairage LED du microphone USB Yeti X pour une esthétique personnalisée dans votre home studio pour donner une touche perso à votre micro et rehausser votre streaming\r\nEnsemble de condensateurs à quatre capsules statiques personnalisé: capturez la qualité sonore de diffusion légendaire Blue avec plus de précision et de clarté que jamais pour le gaming professionnel, le streaming sur Twitch, les podcasts et les productions YouTube.\r\nQuatre diagrammes directionnels polyvalents: basculez entre le diagramme cardioïde pour l\'enregistrement et la diffusion en direct, l\'omnidirectionnel pour les conférences téléphoniques, le bidirectionnel pour les podcasts et le stéréo pour les expériences immersives telles que l\'ASMR.', 'Marque	Logitech for Creators\r\nCouleur	Noir\r\nType de connecteur	USB\r\nType de connecteur	USB\r\nType d\'alimentation	Câble électrique\r\nSensibilité audio	100 dB\r\nCompatibilité du périphérique	Ordinateur personnel, Radio\r\nPoids du produit	1.3 Kilogrammes\r\nDiagramme polaire	Bidirectionnel, Unidirectionnel, Omnidirectionnel\r\nRapport signal/bruit	100 dB', 4, 'u54RDyh835.jpg', 'bih98XCtbk.jpg', 't2aSkiJUJN.jpg', 'SGAQ7pgsiZ.jpg', 'rWv2nRV8u9.jpg', 1),
(5, 'Shure Mv7 Microphone Dynamique Usb/Xlr', 8, 229, 'CONNEXION USB OU XLR : La double sortie USB/XLR permet une utilisation en numérique ou en analogique.\r\nAPPLICATIONS DE PRISE DE SON DE PROXIMITɠ: Excellent pour le podcast, l’enregistrement, le streaming live et plus encore.\r\nPANNEAU DE COMMANDES TACTILE INTUITIF : Panneau tactile intuitif pour le contrôle du gain, du volume d’écoute de contrôle, du mix du casque et du mute du micro.\r\nSORTIE CASQUE INTEGRÉE : La sortie casque intégrée permet une écoute de contrôle directe au casque pendant l’enregistrement.\r\nRESTITUTION RICHE ET NATURELLE DE LA VOIX : Réponse en fréquence optimisée pour une restitution de la voix riche et naturelle.\r\nAPPLICATION ShurePlus MOTIV DESKTOP : le mode Auto-Level ajuste automatiquement les paramètres de gain et de compression, des filtres d\'EQ commutables ajustent la couleur du son et des options permettent de sauvegarder les préréglages personnalisés.\r\nCONSTRUCTION ENTIÈREMENT EN MÉTAL : La construction robuste et professionnelle entièrement en métal assure une fiabilité exceptionnelle.', 'Marque : Shure\r\nCouleur : MV7 Noir\r\nType de connectique : USB\r\nTechnologie de connectivité : XLR\r\nType d\'alimentation : Câble électrique\r\nSensibilité audio : 132 dB\r\nNombre de batteries : 1 Lithium-ion nécessite des piles.\r\nPoids de l\'article : 2.31 Livres\r\nDiagramme polaire : Unidirectionnel\r\nMatériau : Métal', 4, '29muqGYkUY.jpg', 'xmJgzIi0TK.jpg', 'Dpi8aJCUaW.jpg', '0NSTGOmTJd.jpg', 'lcOY3pWR7K.jpg', 1),
(6, 'ViewSonic VX2458-mhd Moniteur VA 24&quot; Full HD 1920x1080, 1ms, 144 Hz', 4, 189, 'Le taux de rafraîchissement de 144 Hz et l’AMD FreeSync offrent un visuel fluide et sans distorsion\r\nAvec un taux de rafraîchissement rapide de 144 Hz, ce moniteur offre une belle fluidité visuelle et des graphismes de qualité, quelle que soit la rapidité à laquelle l\'action dans le jeu se déroule. Grâce à la technologie AMD FreeSync, chaque scène est parfaitement fluide.\r\nTemps de réponse rapide pour des vidéos nettes et de qualité visuelle\r\nAvec un temps de réponse étonnamment rapide, ce moniteur affiche des images fluides sans traces, qui ne sont ni floues ni dédoublées. Ce temps de réponse ultra-rapide est parfait pour les jeux à charge graphique intense, et offre une qualité visuelle exceptionnelle en regardant des émissions sportives ou des films d\'action.\r\nStabilisation du noir pour une meilleure visibilité dans les décors sombres\r\nLa stabilisation du noir développée par ViewSonic vous aide à dominer vos concurrents en offrant une meilleure visibilité, plus détaillée, en illuminant les décors sombres.\r\nFaible décalage de l\'image pour une expérience de visionnage fluide\r\nLe VX2458-MHD utilise un réducteur de processeur intégré qui réduit la latence du signal afin d\'obtenir un faible décalage de l\'image. Il transmet un signal d\'affichage rapide depuis la carte graphique vers l\'écran, rendant les utilisateurs plus compétitifs.\r\nContraste Méga-Dynamique\r\nUn contraste méga-dynamique de 80M:1 crée une profondeur d’image en augmentant la définition des couleurs les plus sombres et les plus claires à l’écran, garantissant des images les plus détaillées possible avec le VX2458-MHD.', 'Viewsonic VX Séries VX2458-mhd. Taille de l\'écran: 59, 9 cm (23.6&quot;)\r\nRésolution de l\'écran: 1920 x 1080 pixels\r\nType HD: Full HD\r\nTechnologie d\'affichage: LED\r\nSurface d\'affichage: Mat\r\nTemps de réponse: 5 ms\r\nFormat d\'image: 16: 9\r\nAngle de vision horizontal: 170°\r\nAngle de vision vertical: 160°. Haut-parleurs intégrés. Montage VESA. Certifié Energy Star. Couleur du produit: Noir\r\nRouge', 2, 'zysTfSg5N0.jpg', '7q3yeoaWqn.jpg', 'BY5uZOtbBf.jpg', 'ouGJnpc0tW.jpg', 'IQbkcvO38m.jpg', 1),
(7, 'BenQ GL2480 Moniteur de jeu LED 24 pouces, FHD 1080p, Eye-Care, 1ms, 75Hz, Anti-reflet, HDMI, DVI, N', 4, 160, 'Affichage FHD impressionnant : profitez d\'une qualité d\'image 16:9 parfaite avec une résolution de 1920 x 1080, ainsi que d\'un temps de réponse élevé 1ms. Zone d\'affichage (mm): 531,36 x 298,89\r\nBords ultra-fins : minimise les distractions et crée une configuration multi-écrans parfaite\r\nConnectivité complète : les ports HDMI, DVI et VGA permettent de basculer facilement entre divers périphériques\r\nTechnologie Brightness Intelligence (B.I) : ajuste activement la luminosité suivant le contenu à l\'écran et les conditions de lumière ambiante\r\nSystème de gestion des câbles : dissimule les câbles dans le socle de l\'écran\r\nSupport mural VESA : 100 x 100 mm', 'Marque : ‎BenQ\r\nNuméro du modèle de l\'article : ‎GL2480\r\nséries : GL2480\r\nCouleur : Noir\r\nGarantie constructeur : ‎2 ans constructeur\r\nType d\'écran : LCD\r\nTaille de l\'écran : ‎24 Pouces\r\nRésolution de l\'écran : 1920 x 1080 pixels\r\nResolution : ‎1080p Full HD\r\nÉtirement : 16:9\r\nInterface du matériel informatique : ‎HDMI\r\nNombre de ports : HDMI ‎1\r\nType de connecteur : ‎D-Sub\r\nDimensions de l\'article L x L x H : ‎43.3 x 56.5 x 17.5 centimètres\r\nPoids du produit : ‎3.9 Kilogrammes\r\nDivers : ‎Fréquence de Balayage Verticale en Hz: 75\r\nDisponibilité des pièces détachées : ‎Information indisponible sur les pièces détachées', 3, '7EOhypbmb3.jpg', 'JlzmsnWodz.jpg', 'XvIEgvW9zJ.jpg', 'U7w0adjm20.jpg', 'tvXXLBexBA.jpg', 1),
(8, 'Acer Predator XB253QGPbmiiprzfx Écran PC Gaming 24.5&quot; Full HD IPS 165 Hz', 4, 200, 'IMAGES INCROYABLES : faites l\'expérience d\'une clarté inégalée et de couleurs fidèles à la réalité avec cet écran Full HD de 24.5 pouces; les nuances et les contrastes restent fidèles, avec un angle de vue pouvant atteindre 178 °\r\nSUPERBEMENT SYNCHRONISÉ : éliminez le gameplay instable et les coupures visuelles gênantes avec la technologie NVIDIA G-Sync compatible; le taux de rafraîchissement de l\'écran Predator est synchronisé avec la fréquence d\'images de l\'ordinateur pour des visuels réactifs\r\nRÉPONSE HAUTE VITESSE : découvrez des jeux fluides et sans latence avec un taux de rafraîchissement rapide jusqu’à 165Hz, et profitez d\'images claires et nettes avec le temps de réponse ultra court Fast LC 2ms (G2G), 0.9ms (G2G Min) même lorsque l\'action devient frénétique\r\nVESA DISPLAY HDR 400 : cette certification spécifie la qualité HDR, y compris la luminance, la gamme de couleurs, la profondeur de bits et les temps de chargement; améliorez votre niveau de jeu en améliorant la précision et le contraste des couleurs\r\nPREDATOR GAMEVIEW : propose plusieurs fonctionnalités utiles, telles que la définition des niveaux d\'ombres avec Dark Boost, le réglage précis des couleurs du moniteur gaming, le choix parmi trois modes de jeu (action, course, sports) et bien plus encore', 'Marque:‎Acer\r\nNuméro du modèle de l\'article:‎UM.KX3EE.P14\r\nséries:Acer Predator XB253QGP\r\nCouleur:‎Noir\r\nGarantie constructeur:Garantie fabricant 2 ans\r\nType d\'écran:‎LED\r\nTaille de l\'écran:24.5 Pouces\r\nResolution:‎1920 x 1080\r\nÉtirement:‎16:9\r\nInterface du matériel informatique:‎DisplayPort, HDMI, USB 3.0\r\nNombre de ports:HDMI	‎2\r\nType de connecteur:‎USB, HDMI\r\nDimensions de l\'article L x L x H:‎23.6 x 55.8 x 51.3 centimètres\r\nPoids du produit:‎5300 Grammes\r\nDisponibilité des pièces détachées:‎Information indisponible sur les pièces détachées', 3, 'TlgqNWfqnT.jpg', '7AS0vvhU2g.jpg', 'yrhFzNrm1w.jpg', 'fgQ7KMcGOI.jpg', '', 1),
(9, 'LG UltraGear 27GL63T-B, Moniteur Gaming IPS Full HD 27\'\' 1920x1080, 1ms, 144Hz', 4, 200, 'Moniteur 16:9 Full HD IPS 27\'\' (1920x1080)\r\nTemps de réponse 1ms, Fréquence 144Hz\r\nAMD FreeSync, NVIDIA Gsync Compatible\r\nConnectiques HDMI et Display Port\r\nHDR 10, Ajustable Hauteur et Pivotable\r\nLuminosité: 320cd (typ) / 400cd (Min)', 'Taille de l\'écran:27 Pouces\r\nRésolution:FHD 1080p\r\nTechnologie d\'affichage	LCD\r\nMarque:LG Electronics\r\nséries:27GL63T-B\r\nFormat d\'image:16:9\r\nInterface matérielle:HDMI\r\nFréquence de rafraîchissement:144 Hz\r\nTemps de réponse:5 Milliseconds\r\nRésolution d\'affichage maximale:1080p Full HD', 6, 'ebODpQ7Kh9.jpg', 'BWcVpNEFip.jpg', 'M3byuuE2QD.jpg', 'jlC3VADN2t.jpg', 'b3dvcXkM85.jpg', 1),
(11, 'Logitech G915 TKL Tenkeyless LIGHTSPEED Clavier Gaming Mécanique, Switch ultra-plat GL Tactile', 5, 140, 'LIGHTSPEED PRO-GRADE SANS FIL : une performance professionnelle et un taux de rapport de 1 ms. Créez une esthétique épurée et sans fil pour vos stations de combat avec une liberté de gaming ultime. Bluetooth: appareil compatible Bluetooth avec Windows 8 ou version ultérieure, macOS X 10.11 ou version ultérieure, Chrome OS ou Android 4.3 ou version ultérieure, iOS 10 ou version ultérieure. Distance totale de déplacement : 2,7 mm\r\nLIGHTSYNC RVB : l\'éclairage RVB de nouvelle génération synchronise l\'éclairage avec le contenu de vos jeux et médias et personnalisez chaque touche ou créez des animations personnalisées\r\nSwitchs Mécaniques Ultra-Plats : les nouveaux switchs gaming hautes performances offrent la vitesse, la précision et les performances d\'un Switch mécanique tout en étant deux fois plus petit\r\nCONCEPTION COMPACTE TKL : la conception sans pavé numérique offre les technologies avancées attendues et design compact pour les gamers. Rangez votre récepteur à l’arrière pour plus de portabilité\r\nÉLÉGANTE ESTHÉTIQUE MÉTALLIQUE : ce clavier d\'une grande qualité de fabrication est conçu dans un alliage aluminium de qualité aéronautique qui permet une grande robustesse et une finesse incroyable\r\nBATTERIE LONGUE DURÉE : 40 heures de jeu avec une seule charge. Batterie chargée en 3 heures seulement, signaux lorsqu\'elle atteint 15 % de charge pour que vous ne soyez jamais pris au dépourvu\r\nLe n° 1 mondial des périphériques gaming : d\'après des données de ventes agrégées indépendantes (fév. 2019 - fév. 2020) sur le nombre d\'unités de périphériques de gaming (claviers, souris et casques PC)', 'Description du clavier:Gaming\r\nType de connecteur:Bluetooth\r\nCaractéristique spéciale:Hotkeys_and_media_keys\r\nCompatibilité du périphérique:Ordinateur\r\nComposants inclus:1 pièce.\r\nMarque:Logitech G\r\nséries: Clavier gaming mécanique RVB sans fil LIGHTSPEED G915 TKL sans pavé numérique\r\nCouleur:Noir\r\nStyle:Tactile Switchs\r\nDimensions de l\'article L x l x H:36.8 x 15 x 2.2 centimètres', 4, 'JbX9gKl7QA.jpg', 'iL7SHeGhZC.jpg', 'guwmpERHrg.jpg', 's9YsWYOtWv.jpg', 'iXNchRGo6D.jpg', 1),
(12, 'Logitech G PRO TKL Tenkeyless Clavier Gaming Mécanique', 5, 95, 'Personnalisé pour les pros : conçu avec et pour les athlètes eSports recherchant des performances, une vitesse et une précision exceptionnelles. Force d\'actionnement : 50 g\r\nSwitchs sonores GX Blue de qualité professionnelle : les switchs sonores GX Blue robustes offrent un clic audible et un retour de saisie tactile pour une pression solide et sécurisée sur la touche\r\nConception compacte ultra-portable : la conception compacte sans pavé numérique libère de l\'espace sur la table pour déplacer la souris. Il est également facile à emballer et à transporter pour les tournois\r\nConception compacte ultra-portable : la conception compacte sans pavé numérique libère de l\'espace sur la table pour déplacer la souris. Il est également facile à emballer et à transporter pour les tournois\r\nLIGHTSYNC RVB : utilisez LIGHTSYNC pour mettre les touches en valeur et programmer des motifs d\'éclairage statique dans la mémoire intégrée pour les configurations de tournoi n\'autorisant pas l\'installation de G HUB\r\nCâble détachable : le câble micro-USB détachable possède une conception à trois dents pour une connexion facile et sécurisée, ainsi qu\'un transport facile dans votre sac de voyage\r\nPatins en caoutchouc antidérapants et réglage de l\'angle : réglage de l\'angle à trois crans pour un confort accru et des patins en caoutchouc pour une stabilité à toute épreuve lors des sessions de gaming intensives', 'Description du clavier:AZERTY\r\nType de connecteur:Bluetooth, USB\r\nCompatibilité du périphérique:Ordinateur, Ordinateur portable\r\nMarque:Logitech G\r\nséries:Logitech G Pro Mechanical Gaming Keyboard\r\nCouleur:Noir\r\nNombre de clés:104\r\nStyle:Disposition française\r\nDimensions de l\'article L x l x H:15.3 x 36 x 3.4 centimètres\r\nSystème d\'exploitation:Linux, Mac OS X 10.12 Sierra, Windows, IOS, Android', 3, 'p7RW3882L9.jpg', 'lILyFi9a2J.jpg', 'bJls1Bggax.jpg', 'Ky1FvBCAA2.jpg', 'FS0IaQ1716.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  `pp` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `birthdate`, `active`, `categorie`, `pp`) VALUES
(3, 'admin', 'admin', 'admin@admin.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '2002-07-09', 1, 7, 'MEI8ylwspzU08Gf1yvlz.png'),
(4, 'Monrocq', 'Ugo', 'ugo.monrocq@gmail.com', 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a', '2022-05-05', 1, 1, 'AtTgUvcxIKbCZHLyGRfB.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
